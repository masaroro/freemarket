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
    public function index(Request $request){
        $user = Auth::user();
        $keyword = $request->query('keyword');

        $query = Listing::with(['user', 'likes']);

        if ($user && empty($user->profile)) {
            return redirect('/mypage/profile');
        }

        $page = $request->query('page');

        if ($page === 'mylist') {
            $query->whereHas('likes', function($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        } else {
            $query->where('seller_id', '!=', $user->id);
        }

        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')->orWhere('brand', 'LIKE', '%' . $keyword . '%');
            });
        }

        $listings = $query->paginate(8);
        $listings->appends(['page' => $page, 'keyword' => $keyword]);

        return view('index',compact('listings', 'page', 'keyword'));
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

    public function like(Request $request, $item_id){
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)->where('listing_id', $item_id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'listing_id' => $item_id,
            ]);
        }

        return redirect("/item/$item_id/");
    }

    public function comment(Request $request, $item_id){
        $user = Auth::user();

        Review::create([
            'user_id' => $user->id,
            'listing_id' => $item_id,
            'comment' => $request->input('comment'),
        ]);

        return redirect("/item/$item_id/");
    }

}