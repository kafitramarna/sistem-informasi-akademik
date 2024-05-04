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
        if (!Schema::hasTable('menu')) {
            Schema::create('menu', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('url');
                $table->smallInteger('is_mahasiswa')->default(0);
                $table->smallInteger('is_dosen')->default(0);
                $table->smallInteger('is_admin')->default(0);
                $table->smallInteger('is_super_admin')->default(0);
                $table->smallInteger('is_active')->default(1);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
