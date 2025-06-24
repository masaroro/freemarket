<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Like;
use App\Models\Review;

class ItemController extends Controller
{
    public function index(){
        $listings = Listing::with(['user'])->paginate(10);
        return view('index',compact('listings'));
    }

    public function detail($item_id){
        $listing = Listing::with(['user', 'categories', 'likes', 'reviews'])->find($item_id);
        $categories = Category::all();
        $reviews = Review::where('listing_id', $item_id)->with(['user'])->get();
        return view('detail',compact('listing', 'categories', 'reviews'));
    }
}
