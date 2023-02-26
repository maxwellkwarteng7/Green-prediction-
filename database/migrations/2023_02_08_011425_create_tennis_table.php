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
        Schema::create('tennis', function (Blueprint $table) {
          $table->id();
          $table->string('league')->nullable();
          $table->string('game')->nullable();
          $table->string('time')->nullable();
          $table->string('prediction')->nullable();
          $table->string('odds')->nullable();
          $table->string('category')->nullable();
          $table->string('check')->default('pending');
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
        Schema::dropIfExists('tennis');
    }
};
