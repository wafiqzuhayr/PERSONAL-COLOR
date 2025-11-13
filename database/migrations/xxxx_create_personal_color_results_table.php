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
        Schema::create('personal_color_results', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('photo_path');
            $table->string('skin_tone', 50);
            $table->json('undertones');
            $table->string('color_type', 20);
            $table->boolean('accept_marketing')->default(false);
            $table->timestamps();
            
            // Indexes untuk improve performance
            $table->index('email');
            $table->index('color_type');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_color_results');
    }
};