<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $listings = Listing::with(['user'])->paginate(10);
        return view('profile',compact('listings'));
    }

    public function edit(){
        $user = Auth::user();
        return view('setting',compact('user'));
    }
}
