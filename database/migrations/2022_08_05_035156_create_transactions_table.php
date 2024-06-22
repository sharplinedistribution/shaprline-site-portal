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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('customer_id')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->integer('first_4')->nullable();
            $table->integer('last_6')->nullable();
            $table->double('fees', 8, 2)->nullable();
            $table->longText('object')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('package')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('merchant_id')->nullable();
            $table->dateTime('expiry_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
