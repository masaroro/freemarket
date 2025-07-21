<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Listing;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddressRequest;

class ProfileController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $keyword = $request->query('keyword');
        $page = $request->query('page');

        $query = Listing::with(['user', 'orders']);

        if ($page === 'purchase') {
            $query->whereHas('orders', function($query) use ($user) {
                $query->where('buyer_id', $user->id);
            });
        } else {
            $query->where('seller_id', $user->id);
        }

        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')->orWhere('brand', 'LIKE', '%' . $keyword . '%');
            });
        }

        $profile = Profile::where('user_id', Auth::id())->first();

        $listings = $query->simplePaginate(9);
        $listings->appends(['page' => $page, 'keyword' => $keyword]);

        return view('profile',compact('listings', 'profile', 'user', 'page'));
    }

    public function edit(){
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('setting',compact('user', 'profile'));
    }

    public function update(AddressRequest $request){
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

        if ($request->hasFile('image')) {

            // 画像がアップロードされている場合、既存の画像を削除
            if ($profile->image && Storage::disk('public')->exists($profile->image)) {
                Storage::disk('public')->delete($profile->image);
            }

            $extension = $request->file('image')->getClientOriginalExtension();
            $file_name = sprintf('%03d',$user->id) . '_profile.' . $extension;
            $request->file('image')->storeAs('public/images/profile/', $file_name);

            $profile->image = 'storage/images/profile/' . $file_name;
        }

        $profile->postal_code = $request->input('postal_code');
        $profile->address = $request->input('address');
        $profile->building = $request->input('building');

        // updated_at と created_at で初回なのか判定→redirect分岐へ
        $isFirstUpdate = $profile->created_at->equalTo($profile->updated_at);

        $profile->save();

        if ($isFirstUpdate) {
            return redirect('/');
        } else {
            return redirect('/mypage/profile');
        }
    }
}
