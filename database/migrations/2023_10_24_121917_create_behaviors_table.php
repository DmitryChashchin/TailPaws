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
        Schema::create('behaviors', function (Blueprint $table) {
            $table->id();
            $table->boolean('get_along_with_dogs')->default(false);
            $table->boolean('get_along_with_cats')->default(false);
            $table->boolean('get_along_with_kids')->default(false);
            $table->boolean('housetrained')->default(false);
            $table->boolean('has_a_bite_history')->default(false);
            $table->boolean('needs_experienced_adopter')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('behaviors');
    }
};
