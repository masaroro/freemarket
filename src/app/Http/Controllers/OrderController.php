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
        $user = User::find(auth()->id());
        $profile = Profile::where('user_id', $user->id)->first();

        $order = Order::create([
            'buyer_id' => $user->id,
            'listing_id' => $item_id,
            'paid' => $listing->price,
            'shopping_postal_code' => $profile,
            'shopping_address' => $profile->address,
            'shopping_building' => $profile->building,
            'pay_method' => $request->input('pay'),
            'order_status' => 0, // 0:未入金, 1:入金済み
        ]);

        return redirect("/mypage");
    }

    public function edit($item_id){
        $profile = Profile::where('user_id', auth()->id())->first();
        $listing = Listing::find($item_id);
        return view('address', compact('profile', 'listing'));
    }

    public function update(Request $request, $item_id){
        $listing = Listing::with(['user', 'categories'])->find($item_id);
        $shopping_postal_code = $request->input('shopping_postal_code');
        $shopping_address = $request->input('shopping_address');
        $shopping_building = $request->input('shopping_building');
        return view('order', compact('listing','shopping_postal_code', 'shopping_address', 'shopping_building'));
    }

}
