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
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_songs');
            $table->string('album_title');
            $table->string('album_artwork');
            $table->string('upc_code')->nullable();
            $table->string('version')->nullable()->default('original');
            $table->text('artist');
            $table->date('release_date');
            $table->string('language');
            $table->string('primary_genre');
            $table->string('secondary_genre')->nullable();
            $table->text('stores');
            $table->text('track_ids');
            $table->integer('user_id');
            $table->tinyInteger('status')->default(0);
            $table->text('remarks')->nullable();
            $table->tinyInteger('approved_by')->nullable();
            $table->date('approved_at')->nullable();
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
        Schema::dropIfExists('releases');
    }
};
