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
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('email');
            $table->foreignid('country_id');
            
            $table->foreignid('state_id');
            $table->foreignid('city_id');
            $table->string('address');
            $table->string('zipcode');
            $table->integer('amount');
            $table->string('payment_method');
            $table->boolean('payment_status')->default(0);
            $table->string('order_status')->default(0);
            $table->timestamps();
            $table->softDeletes();

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
