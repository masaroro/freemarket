<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;

class OrderController extends Controller
{
    public function index($item_id){
        $listing = Listing::with(['user', 'categories'])->find($item_id);
        $profile = Profile::where('user_id', auth()->id())->first();
        return view('order',compact('listing', 'profile'));
    }

    public function edit($item_id){
        return view('address');
    }

    public function create(){
        $categories = Category::all();
        return view('listing', compact('categories'));
    }
}
