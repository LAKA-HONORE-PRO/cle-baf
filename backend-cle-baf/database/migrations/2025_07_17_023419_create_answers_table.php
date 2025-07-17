<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('type');
            $table->boolean('is_correct');
            $table->unsignedBigInteger('question_id');
            $table->string('slug')->unique();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};