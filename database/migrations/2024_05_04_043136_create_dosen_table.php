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
        if (!Schema::hasTable('dosen')) {
            Schema::create('dosen', function (Blueprint $table) {
                $table->id();
                $table->string('nik');
                $table->string('nidn');
                $table->string('nama');
                $table->string('email')->nullable();
                $table->string('password');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
