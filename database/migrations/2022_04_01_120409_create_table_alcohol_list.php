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
        Schema::create('alcohol_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('degrees');
            $table->integer('alcohol_id')->unsigned()->nullable(); 
            $table->foreign('alcohol_id')->references('id')->on('alcohol');
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
        Schema::dropIfExists('alcohol_list');
    }
};
