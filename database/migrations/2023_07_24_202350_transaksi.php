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
        Schema::create('Transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('idTransaksi')->unique();
            $table->bigInteger('idUser');
            $table->bigInteger('jumlahProduk');
            $table->bigInteger('totalHarga'); 
            $table->string('statusTransaksi');
            $table->timestamps(); 

            $table->foreign('idUser')->references('id')->on('users');
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
