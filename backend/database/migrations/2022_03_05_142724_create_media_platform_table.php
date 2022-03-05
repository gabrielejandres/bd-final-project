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
        Schema::create('media_platform', function (Blueprint $table) {
            $table->integer('media_id')->unsigned();
            $table->integer('platform_id')->unsigned();
            $table->date('inclusion_date');
            $table->primary(['platform_id', 'media_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_platform');
    }
};
