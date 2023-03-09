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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('userid',200);
            $table->string('firstname',200)->nullable();
            $table->string('lastname',200)->nullable();
            $table->string('email',200)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',200)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('verify_otp',50)->nullable();
            $table->boolean('isactive')->default(1);
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
