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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isrc_code')->nullable();
            $table->text('artist');
            $table->string('lyrics'); //Additional field
            $table->string('contains_1');
            $table->string('contains_2');
            $table->string('language');
            $table->text('songwriter');
            $table->string('audio_track');
            $table->string('track_version')->nullable();
            $table->text('artist_ids')->nullable();
            $table->string('catalog_id')->nullable();
            $table->string('p_copyright_year')->nullable();
            $table->string('p_copyright_name')->nullable();
            $table->string('c_copyright_year')->nullable();
            $table->string('c_copyright_name')->nullable();
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
        Schema::dropIfExists('tracks');
    }
};
