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
        Schema::table('releases', function (Blueprint $table) {
            $table->string('catalog_id')->nullable();
            $table->string('p_copyright_year')->nullable();
            $table->string('p_copyright_name')->nullable();
            $table->string('c_copyright_year')->nullable();
            $table->string('c_copyright_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('releases', function (Blueprint $table) {
            //
        });
    }
};
