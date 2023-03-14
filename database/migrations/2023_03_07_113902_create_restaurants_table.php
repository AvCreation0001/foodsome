<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->uuid('restaurant_id',200);
            $table->string('location_id');
            $table->string('restaurant_name');
            $table->longText('food_type');
            $table->longText('address');
            $table->string('phone');
            $table->string('timing');
            $table->string('overview');
            $table->string('payments');
            $table->string('location_link');
            $table->string('restaurant_image');
            $table->string('menu_images');
            $table->string('restaurant_type');
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
        Schema::dropIfExists('restaurants');
    }
};
