<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function index(){
        return view('profile');
    }

    public function edit(){
        return view('setting');
    }
}
