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
        Schema::create('wisuda_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('year'); // e.g., 2024/2025
            $table->string('schedule_genap_link')->nullable();
            $table->string('schedule_ganjil_link')->nullable();
            $table->string('photo_genap_link')->nullable();
            $table->string('photo_ganjil_link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisuda_schedules');
    }
};
