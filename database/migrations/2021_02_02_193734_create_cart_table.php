<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->unsigned();
            $table->unsignedInteger('product_id')->unsigned();
            $table->string('image');
            $table->string('name');
            $table->integer('price');
            $table->integer('totalprice');
            $table->integer('quantity');
            $table->string('color');
            $table->string('size');
            
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
        Schema::dropIfExists('cart');
    }
}