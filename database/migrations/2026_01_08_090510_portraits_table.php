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
        Schema::create('portraits', function (Blueprint $table) {
            $table->id();
            $table->integer('view')->default(0);
            $table->string('source');
            $table->timestamps();
            $table->string('artist_name');
            $table->string('painting_name'); //put in itallic in the frontend
            $table->string('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portraits');
    }
};
