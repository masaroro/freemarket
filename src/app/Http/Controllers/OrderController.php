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
        return view('order');
    }

    public function edit($item_id){
        return view('address');
    }

    public function create(){
        return view('listing');
    }
}
