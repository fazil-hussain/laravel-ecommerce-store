<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('pro_id');
            $table->foreign('pro_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('qty');
            $table->foreignId('color');
            $table->foreign('color')->references('id')->on('colors')->onDelete('cascade');
            $table->foreignId('size');
            $table->foreign('size')->references('id')->on('sizes')->onDelete('cascade');
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
        Schema::dropIfExists('order_items');
    }
}
