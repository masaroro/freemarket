<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'status', //0:良好 1:目立った傷や汚れなし 2:やや傷や汚れあり 3:状態が悪い
        'name',
        'brand',
        'description',
        'price',
        'is_sold',
        'sold_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'listing_category', 'listing_id', 'category_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
