<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExhibitionRequest;

class ItemController extends Controller
{
    public function index(){
        $user = Auth::user();

        if ($user && empty($user->profile)) {
            return redirect('/mypage/profile');
        }

        $listings = Listing::with(['user'])->paginate(8);
        return view('index',compact('listings'));
    }

    public function detail($item_id){
        $listing = Listing::with(['user', 'categories', 'likes', 'reviews'])->find($item_id);
        $categories = Category::all();
        $reviews = Review::where('listing_id', $item_id)->with(['user'])->get();
        return view('detail',compact('listing', 'categories', 'reviews'));
    }

    public function create(){
        $categories = Category::all();
        return view('listing', compact('categories'));
    }

    public function store(Request $request){
        $listing = new Listing();
        $listing->seller_id = Auth::id();

        $listing->status = $request->input('status');
        //0:良好 1:目立った傷や汚れなし 2:やや傷や汚れあり 3:状態が悪い
        $listing->image = '';
        $listing->name = $request->input('name');
        $listing->brand = $request->input('brand');
        $listing->description = $request->input('description');
        $listing->price = $request->input('price');
        $listing->is_sold = 0;

        $listing->save();

        $extension = $request->file('image')->getClientOriginalExtension();
        $file_name = sprintf('%03d',$listing->id) . '_listing_seller' . sprintf('%03d',Auth::id()) . '.' . $extension;
        $request->file('image')->storeAs('public/images/item/', $file_name);
        $listing->image = 'storage/images/item/' . $file_name;

        $listing->save();

        $listing->categories()->sync($request->input('categories'));

        return redirect('/mypage');
    }
}