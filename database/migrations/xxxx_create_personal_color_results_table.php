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
            // Primary Key
            $table->id();

            // User Information
            $table->string('name', 255)->comment('Nama lengkap user');
            $table->string('email', 255)->unique()->comment('Email user');
            $table->string('phone', 20)->nullable()->comment('Nomor telepon');
            $table->string('photo_path')->nullable()->comment('Path foto profil');

            // Color Analysis Data
            $table->enum('skin_tone', ['warm', 'cool', 'neutral'])
                  ->comment('Tone kulit user (warm/cool/neutral)');
            
            $table->string('hair_color', 100)
                  ->comment('Warna rambut user');
            
            $table->string('eye_color', 100)
                  ->comment('Warna mata user');
            
            $table->enum('skin_brightness', ['very_fair', 'fair', 'medium', 'tan', 'deep'])
                  ->comment('Tingkat kecerahan kulit');
            
            $table->enum('contrast_level', ['high', 'medium', 'low'])
                  ->comment('Level kontras antara rambut, kulit, mata');
            
            $table->enum('saturation', ['muted', 'medium', 'vibrant'])
                  ->comment('Tingkat saturasi warna kulit');
            
            $table->enum('color_type', ['spring', 'summer', 'autumn', 'winter'])
                  ->comment('Tipe warna musiman (seasonal color)');

            // Additional Information
            $table->text('notes')->nullable()
                  ->comment('Catatan tambahan dari user');
            
            $table->boolean('accept_marketing')->default(false)
                  ->comment('Apakah user setuju menerima marketing');

            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index('email');
            $table->index('skin_tone');
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