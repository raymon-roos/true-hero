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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')
                ->unique();
            $table->string('email');
            $table->string('password');
            $table->string('first_name');
            $table->string('infix')
                ->nullable();
            $table->string('last_name');
            $table->unsignedInteger('age')
                ->nullable();
            $table->string('phone_number')
                ->nullable();
            $table->boolean('is_admin')
                ->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
