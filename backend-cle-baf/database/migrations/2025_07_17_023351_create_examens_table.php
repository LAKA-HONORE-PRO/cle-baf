<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->unsignedBigInteger('unit_id');
            $table->integer('duree');
            $table->string('type');
            $table->boolean('etat')->default(false);
            $table->integer('nbre_points');
            $table->integer('nbre_passage');
            $table->text('description');
            $table->text('objectifs');
            $table->string('slug')->unique();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};