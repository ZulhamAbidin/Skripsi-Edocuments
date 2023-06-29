<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanTable extends Migration
{
    public function up()
    {
       Schema::create('pengalaman', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users');
    $table->string('name');
    $table->string('email');
    $table->text('pengalamanpengunjung');
    $table->timestamps();
});

    }

    

    public function down()
    {
        Schema::dropIfExists('pengalaman');
    }
}
