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
        Schema::create('sks', function (Blueprint $table) {
            $table->id();
            $table->string('mata_kuliah');
            $table->integer('banyak_sks');
            $table->integer('dosen_pengampu');
            $table->string('hari_mengajar');
            $table->time('jam_mengajar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
