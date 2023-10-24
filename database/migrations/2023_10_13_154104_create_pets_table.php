<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('breed')->nullable();
            $table->string('color')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('weight')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->boolean('vaccinated')->nullable();
            $table->string('pet_condition')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('behavior_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
