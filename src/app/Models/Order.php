<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'listing_id',
        'paid',
        'shopping_postal_code',
        'shopping_address',
        'shopping_building',
        'pay_method', // 1: コンビニ支払い, 2: カード支払い
        'order_status', // 0: 支払い待ち, 1: 完了, 2: キャンセル
    ];

    public function listing(){
        return $this->belongsTo(Listing::class);
    }
}
