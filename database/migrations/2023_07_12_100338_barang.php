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
        Schema::create('Barang', function (Blueprint $table) {
            $table->id();
            $table->char('idBarang')->nullable(false)->unique();
            $table->char('namaBarang')->nullable(false);
            $table->char('tipeBarang');
            $table->integer('jumlahBarang')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
