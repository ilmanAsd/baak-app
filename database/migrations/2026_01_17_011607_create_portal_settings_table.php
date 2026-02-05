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
        Schema::create('portal_settings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('title')->default('Selamat Datang di Portal Akademik');
            $table->text('description')->nullable();
            $table->string('button_1_text')->nullable()->default('Login Mahasiswa');
            $table->string('button_1_url')->nullable()->default('https://siam.unik-kediri.ac.id/Login');
            $table->string('button_2_text')->nullable()->default('Login Dosen');
            $table->string('button_2_url')->nullable()->default('https://simpeg.unik-kediri.ac.id/welcome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portal_settings');
    }
};
