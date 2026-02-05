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
        Schema::create('external_documents', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('document_number');
            $table->string('title');
            $table->enum('status', ['Berlaku', 'Tidak Berlaku'])->default('Berlaku');
            $table->enum('category', ['Akademik', 'Pembelajaran', 'Kemahasiswaan']);
            $table->string('file_path')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_documents');
    }
};
