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
        Schema::create('Cart', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idProduk'); 
            $table->bigInteger('idUser');
            $table->integer('jumlah');
            $table->string('status');
            $table->timestamps(); 

            $table->foreign('idProduk')->references('id')->on('Produk');
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
