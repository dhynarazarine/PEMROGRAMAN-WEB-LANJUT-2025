<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void // digunakan untuk fungsi yang di panggil saat migrate dijalankan
    {
        
        Schema::create('items', function (Blueprint $table) {  //schema:create : membuat tabel baru dalam database, items : nama tabel yang dibuat, Blueprint $table : objek untuk mendefinisikan struktur tabel
            // membuat kolom kolom  dengan tipe yang telah ditentukan
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
