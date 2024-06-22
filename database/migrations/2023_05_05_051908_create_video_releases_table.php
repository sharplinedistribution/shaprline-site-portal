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
        Schema::create('video_releases', function (Blueprint $table) {
            $table->id();
            $table->string('video_title');
            $table->text('artist');
            $table->string('primary_genre');
            $table->string('secondary_genre')->nullable();
            $table->string('primary_language');
            $table->string('label_copyright');
            $table->string('upc_code')->nullable();
            $table->string('isrc_code')->nullable();
            $table->text('songwriter');
            $table->text('lyrics')->nullable();
            $table->string('video_thumbnail');
            $table->string('video_track');
            $table->date('release_date');
            $table->integer('user_id');
            $table->tinyInteger('status')->default(0);
            $table->text('remarks')->nullable();
            $table->tinyInteger('approved_by')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('video_releases');
    }
};
