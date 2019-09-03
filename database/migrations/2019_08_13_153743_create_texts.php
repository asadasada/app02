<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->string("name")->nullable();
            $table->string("mail")->nullable();
            $table->string("text");
            $table->string("ip");
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
        Schema::dropIfExists('texts');
    }
}
