<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

        DB::table('users')->insert([
            ['idUser' => 'MNG-0001',
             'namaUser' => 'Rizkan Ramdani',
             'username' => 'Ramdani090',
             'status' => 'Manager',
             'password' => '$2y$10$VoGniNhvRBXnLaeihCgIX.cQ6LLb9CAs8w3HbybHoLqmzhd2ycnsC',
             'email' => 'rizkan090@gmail.com',
             'profile' => 'manager.jpg'
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
