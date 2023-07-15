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
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->char('idUser')->nullable(false)->unique();
            $table->char('namaUser')->nullable(false);
            $table->char('username')->nullable(false);
            $table->char('status')->nullable(false); 
            $table->char('password')->nullable(false); 
            $table->char('email')->nullable(false); 
            $table->char('profile')->nullable(false);
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
