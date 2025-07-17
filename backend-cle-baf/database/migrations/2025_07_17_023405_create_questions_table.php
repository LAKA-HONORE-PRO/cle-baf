<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('type');
            $table->unsignedBigInteger('examen_id');
            $table->integer('nbre_points');
            $table->string('slug')->unique();
            $table->foreign('examen_id')->references('id')->on('examens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};