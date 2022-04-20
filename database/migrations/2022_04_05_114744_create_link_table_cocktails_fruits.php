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
        Schema::create('cocktails_fruits', function (Blueprint $table) {
            $table->unsignedBigInteger('cocktail_id')->nullable();
            $table->unsignedBigInteger('fruits_id')->nullable();
            $table->foreign('fruits_id')->references('id')->on('fruits');
            $table->foreign('cocktail_id')->references('id')->on('cocktails');
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
        Schema::dropIfExists('cocktails_fruits');
    }
};
