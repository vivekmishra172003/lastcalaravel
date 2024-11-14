<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('score');
            $table->integer('total_questions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quiz_attempts');
    }
};