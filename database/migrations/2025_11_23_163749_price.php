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
        Schema::create('price', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_paket')->nullable();
            $table->string('harga_awal')->nullable();
            $table->string('harga_promo')->nullable();
            $table->string('hemat_persentase')->nullable();
            $table->string('best_price')->nullable();
            $table->string('show_homepage')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['active', 'non-active'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price');
    }
};
