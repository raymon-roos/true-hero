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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('hero_alias')
                ->unique();
            $table->string('emergency_contact');
            $table->text('backstory');
            $table->text('motivation');
            $table->unsignedInteger('elo_rating')
                ->default(1200);
            $table->enum('hero_rating', ['C', 'B', 'A', 'S'])
                ->default('C');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
