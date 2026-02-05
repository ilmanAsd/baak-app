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
        Schema::create('mahasiswa_asing_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('total_students')->default(0);
            $table->json('study_programs')->nullable(); // Stores list of prodi names
            $table->string('sop_document')->nullable();
            $table->timestamps();
        });

        Schema::create('mahasiswa_asing_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_asing_page_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_asing_facilities');
        Schema::dropIfExists('mahasiswa_asing_pages');
    }
};
