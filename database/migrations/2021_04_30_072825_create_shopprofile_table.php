<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopprofile', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('streetaddress');
            $table->string('zip');
            $table->string('city');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('shopprofile');
    }
}
