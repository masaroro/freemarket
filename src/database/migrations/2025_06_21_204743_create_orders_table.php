<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('listing_id')->constrained();
            $table->integer('paid');
            $table->string('shopping_postal_code');
            $table->string('shopping_address');
            $table->string('shopping_building');
            $table->tinyInteger('order_status')->default(0); // 0：支払い待ち, 1：完了, 2：キャンセル
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
