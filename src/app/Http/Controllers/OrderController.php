<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Order;
use App\Http\Requests\PurchaseRequest;

class OrderController extends Controller
{
    public function index(Request $request , $item_id){
        $listing = Listing::with(['user', 'categories'])->find($item_id);
        $profile = Profile::where('user_id', auth()->id())->first();
        $shopping_postal_code = $request->input('shopping_postal_code');
        $shopping_address = $request->input('shopping_address');
        $shopping_building = $request->input('shopping_building');

        $selectedPay = $request->pay;

        return view('order',compact('listing', 'profile', 'selectedPay','shopping_postal_code', 'shopping_address', 'shopping_building','selectedPay'));
    }

    public function store(PurchaseRequest $request, $item_id){
        $user = User::find(auth()->id());
        $profile = Profile::where('user_id', $user->id)->first();
        $listing = Listing::with(['user', 'categories'])->find($item_id);

        $order = Order::create([
            'buyer_id' => $user->id,
            'listing_id' => $item_id,
            'paid' => $listing->price,
            'shopping_postal_code' => $request->input('shopping_postal_code'),
            'shopping_address' => $request->input('shopping_address'),
            'shopping_building' => $request->input('shopping_building'),
            'pay_method' => $request->input('pay'),
            'order_status' => 0, // 0:未入金, 1:入金済み
        ]);

        $listing->is_sold = 1; // 1:販売済
        $listing->sold_at = now(); // 販売日時を現在時刻に設定
        $listing->save();

        return redirect("/mypage");
    }

    public function edit($item_id){
        $profile = Profile::where('user_id', auth()->id())->first();
        $listing = Listing::find($item_id);
        return view('address', compact('profile', 'listing'));
    }

    public function update(Request $request, $item_id){
        $listing = Listing::with(['user', 'categories'])->find($item_id);
        $shopping_postal_code = $request->input('postal_code');
        $shopping_address = $request->input('address');
        $shopping_building = $request->input('building');

        $selectedPay = $request->query('pay');

        return view('order', compact('listing','shopping_postal_code', 'shopping_address', 'shopping_building','selectedPay'));
    }

}
