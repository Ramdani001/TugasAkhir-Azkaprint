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
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();
            $table->char('idUser')->nullable(false)->unique();
            $table->string('namaUser')->nullable(false);
            $table->string('username')->nullable(false);
            $table->string('status')->nullable(false); 
            $table->string('password')->nullable(false); 
            $table->string('email')->nullable(false)->unique(); 
            $table->string('profile')->nullable(false);
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
