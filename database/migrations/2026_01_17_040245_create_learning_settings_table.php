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
        Schema::create('learning_settings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('title')->default('Portal Pembelajaran');
            $table->text('description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('spada_url')->default('https://spada1.unik-kediri.ac.id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_settings');
    }
};
