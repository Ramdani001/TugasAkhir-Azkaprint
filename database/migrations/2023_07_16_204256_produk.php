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
        Schema::create('Produk', function (Blueprint $table) {
            $table->id();
            $table->char('idProduk')->nullable(false)->unique();
            $table->char('namaProduk')->nullable(false);
            $table->char('tipeProduk');
            $table->integer('jumlahProduk')->nullable(false);
            $table->bigInteger('hargaProduk');
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
