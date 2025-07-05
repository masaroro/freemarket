<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index(){
        $listings = Listing::with(['user'])->paginate(10);
        return view('profile',compact('listings'));
    }

    public function edit(){
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('setting',compact('user', 'profile'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        // プロフィール情報を取得（なければ新規作成）
        $profile = Profile::firstOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'image' => null,
                'postal_code' => '',
                'address' => '',
                'building' => '',
            ]
        );

        // updated_at と created_at で初回なのか判定→redirect分岐へ
        $isFirstUpdate = $profile->created_at->equalTo($profile->updated_at);

        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $file_name);

            $profile->image = 'storage/images/' . $file_name;
        }

        $profile->postal_code = $request->input('postal_code');
        $profile->address = $request->input('address');
        $profile->building = $request->input('building');

        $profile->save();

        if ($isFirstUpdate) {
            return redirect('/');
        } else {
            return redirect('/mypage');
        }
    }
}
