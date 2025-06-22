<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid',
        'shopping_postal_code',
        'shopping_address',
        'shopping_building',
        'order_status', // 0: 支払い待ち, 1: 完了, 2: キャンセル
    ];
}
