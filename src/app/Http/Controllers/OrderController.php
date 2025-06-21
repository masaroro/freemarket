<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
