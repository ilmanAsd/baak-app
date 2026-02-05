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
        Schema::create('counseling_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('counselor_id')->constrained()->onDelete('cascade');
            $table->string('day'); // Monday, Tuesday, etc.
            $table->time('time_start');
            $table->time('time_end');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counseling_schedules');
    }
};
