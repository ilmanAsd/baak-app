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
        Schema::create('kemahasiswaan_settings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('rector_image')->nullable();
            $table->string('rector_name')->default('Kustanto, SH., MS.');
            $table->string('rector_greeting_title')->default('Sambutan Wakil Rektor III');
            $table->text('rector_greeting_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kemahasiswaan_settings');
    }
};
