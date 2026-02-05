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
        Schema::table('kemahasiswaan_settings', function (Blueprint $table) {
            $table->text('about_description')->nullable();
            $table->integer('stat_staff')->default(0);
            $table->integer('stat_ormawa')->default(0);
            $table->integer('stat_ukm')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kemahasiswaan_settings', function (Blueprint $table) {
            $table->dropColumn(['about_description', 'stat_staff', 'stat_ormawa', 'stat_ukm']);
        });
    }
};
