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

    public function store(Request $request, $item_id){
        // ここで注文処理を実装
        // 例えば、注文情報をデータベースに保存するなど
        // その後、注文完了ページへリダイレクトするなどの処理を行う

        return redirect("/mypage");
    }

    public function edit($item_id){
        $profile = Profile::where('user_id', auth()->id())->first();
        $listing = Listing::find($item_id);
        return view('address', compact('profile', 'listing'));
    }

    public function update(Request $request, $item_id){
        $profile = Profile::where('user_id', auth()->id())->first();
        $profile->postal_code = $request->input('postal_code');
        $profile->address = $request->input('address');
        $profile->building = $request->input('building');
        $profile->save();
        return redirect("/purchase/$item_id/");
    }

}
