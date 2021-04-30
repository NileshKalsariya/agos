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
            $table->integer('product_id');
            $table->integer('user_id');     
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('zip');
            $table->string('city');
            $table->string('email');
            $table->string('phone');
            $table->string('status');
            $table->string('payment_method');
            $table->string('payment_status');      
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
