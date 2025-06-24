<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listing_category')->insert([
            [
                'listing_id' => '1',
                'category_id' => '1',
            ],
            [
                'listing_id' => '2',
                'category_id' => '2',
            ],
            [
                'listing_id' => '3',
                'category_id' => '10',
            ],
            [
                'listing_id' => '4',
                'category_id' => '1',
            ],
            [
                'listing_id' => '4',
                'category_id' => '5',
            ],
            [
                'listing_id' => '5',
                'category_id' => '2',
            ],
            [
                'listing_id' => '6',
                'category_id' => '2',
            ],
            [
                'listing_id' => '7',
                'category_id' => '1',
            ],
            [
                'listing_id' => '7',
                'category_id' => '4',
            ],
            [
                'listing_id' => '8',
                'category_id' => '10',
            ],
            [
                'listing_id' => '9',
                'category_id' => '10',
            ],
            [
                'listing_id' => '10',
                'category_id' => '6',
            ],
        ]);
    }
}
