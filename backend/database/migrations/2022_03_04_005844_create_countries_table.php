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
        Schema::create('countries', function (Blueprint $table) {
            $table->string('code', 2);
            $table->string('name');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->primary(['media_id', 'code', 'name']);
        });

        Schema::table('countries', function (Blueprint $table) { 
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations. 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
