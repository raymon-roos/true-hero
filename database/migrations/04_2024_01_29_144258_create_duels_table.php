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
        Schema::create('duels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_1_id')
                ->constrained('heroes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('hero_2_id')
                ->constrained('heroes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('winner_id')
                ->constrained('heroes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duels');
    }
};
