<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('users')->cascadeOnDelete();
            $table->string('image');
            $table->tinyInteger('status'); //0:良好 1:目立った傷や汚れなし 2:やや傷や汚れあり 3:状態が悪い
            $table->string('name');
            $table->string('brand')->nullable();
            $table->text('description');
            $table->integer('price');
            $table->boolean('is_sold');
            $table->timestamps();
            $table->timestamp('sold_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
