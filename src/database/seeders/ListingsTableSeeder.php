<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listings')->insert([
            [
                'seller_id' => 1,
                'image' => 'storage/images/01_Clock.png',
                'status' => 0,
                'name' => '腕時計',
                'brand' => '',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'price' => 15000,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/02_HardDisk.png',
                'status' => 1,
                'name' => 'HDD',
                'brand' => '',
                'description' => '高速で信頼性の高いハードディスク',
                'price' => 5000,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/03_Onion.png',
                'status' => 2,
                'name' => '玉ねぎ3束',
                'brand' => '',
                'description' => '新鮮な玉ねぎ3束のセット',
                'price' => 300,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/04_LeatherShoes.png',
                'status' => 3,
                'name' => '革靴',
                'brand' => '',
                'description' => 'クラシックなデザインの革靴',
                'price' => 4000,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/05_Laptop.png',
                'status' => 0,
                'name' => 'ノートPC',
                'brand' => '',
                'description' => '高性能なノートパソコン',
                'price' => 45000,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/06_Mike.png',
                'status' => 1,
                'name' => 'マイク',
                'brand' => '',
                'description' => '高音質のレコーディング用マイク',
                'price' => 8000,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/07_Bag.png',
                'status' => 2,
                'name' => 'ショルダーバッグ',
                'brand' => '',
                'description' => 'おしゃれなショルダーバッグ',
                'price' => 3500,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/08_Tumbler.png',
                'status' => 3,
                'name' => 'タンブラー',
                'brand' => '',
                'description' => '使いやすいタンブラー',
                'price' => 500,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/09_CoffeeGrinder.png',
                'status' => 0,
                'name' => 'コーヒーミル',
                'brand' => '',
                'description' => '手動のコーヒーミル',
                'price' => 4000,
                'is_sold' => 0,
            ],
            [
                'seller_id' => 1,
                'image' => 'storage/images/10_外出メイクアップセット.png',
                'status' => 1,
                'name' => 'メイクセット',
                'brand' => '',
                'description' => '便利なメイクアップセット',
                'price' => 2500,
                'is_sold' => 0,
            ],
        ]);
    }
}
