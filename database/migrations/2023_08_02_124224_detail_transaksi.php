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
        Schema::create('DetailCart', function (Blueprint $table) {
            $table->id();
            $table->string('idTransaksi')->nullable(true);
            $table->bigInteger('idProduk'); 
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('idProduk')->references('id')->on('Produk');
            // $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idTransaksi')->references('idTransaksi')->on('Transaksi');

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
