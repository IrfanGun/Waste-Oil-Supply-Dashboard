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
        Schema::create('ringkasans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('saldos_id')->constrained()->onDelete('cascade');
            $table->integer('total_pasokan');
            $table->integer('total_pendapatan');
            $table->integer('pasokan_sekarang');
            $table->integer('pendapatan_sekarang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ringkasans');
    }
};
