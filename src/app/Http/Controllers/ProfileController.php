<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function edit(){
        $user = Auth::user();
        return view('setting',compact('user'));
    }
}
