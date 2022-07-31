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
        Schema::create('tags_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id')->nullable();

          

            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id')->nullable();

          

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('tags_ads');
    }
};
