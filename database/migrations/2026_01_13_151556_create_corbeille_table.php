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
        Schema::create('corbeille', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->integer('likes')->default(0);
            $table->integer('view')->default(0);
            $table->foreignId('portrait_id')->constrained('portraits');
            $table->timestamps();
            $table->boolean('public');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corbeille');
    }
};

