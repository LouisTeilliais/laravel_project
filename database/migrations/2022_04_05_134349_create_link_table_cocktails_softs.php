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
        Schema::create('cocktails_softs', function (Blueprint $table) {
            $table->unsignedBigInteger('cocktail_id')->nullable();
            $table->unsignedBigInteger('softs_id')->nullable();
            $table->foreign('softs_id')->references('id')->on('softs');
            $table->foreign('cocktail_id')->references('id')->on('cocktail');
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
        Schema::dropIfExists('cocktails_softs');
    }
};
