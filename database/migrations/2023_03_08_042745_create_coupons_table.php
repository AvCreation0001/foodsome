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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->uuid('coupon_id');
            $table->string('location_id');
            $table->string('restaurant_id');
            $table->string('offer_name');
            $table->string('offer_detail');
            $table->string('valid_time');
            $table->string('expire_date');
            $table->string('available_coupon');
            $table->string('termsandcondition');
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
        Schema::dropIfExists('coupons');
    }
};
