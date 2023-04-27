<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player');
            $table->foreign('player')->references('id')->on('players')->onDelete('cascade');
            $table->unsignedBigInteger('questionId');
            $table->foreign('questionId')->references('id')->on('questions')->onDelete('cascade');
            $table->string('selectedOption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
