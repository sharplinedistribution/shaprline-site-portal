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
        Schema::create('marketing_campaigns', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('artist_name')->nullable();
            $table->string('email')->nullable();
            $table->string('release_title')->nullable();
            $table->string('spotify_link')->nullable();
            $table->string('itune_link')->nullable();
            $table->string('soundcloud_link')->nullable();
            $table->string('musicvideo_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->date('release_date')->nullable();
            $table->tinyInteger('is_single')->default(0);
            $table->tinyInteger('is_mixtape')->default(0);
            $table->tinyInteger('is_album')->default(0);
            $table->longText('previous_press')->nullable();
            $table->longText('artist_biography')->nullable();
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
        Schema::dropIfExists('marketing_campaigns');
    }
};
