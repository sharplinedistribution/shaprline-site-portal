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
        Schema::create('user_top_stores', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('store_id')->nullable();
            $table->string('split')->nullable();
            $table->double('amount', 8, 2)->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('user_top_stores');
    }
};
