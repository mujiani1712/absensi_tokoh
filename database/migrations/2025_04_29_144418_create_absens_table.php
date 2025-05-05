<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            

            
            
            
            $table->string('tipe'); // masuk / pulang
            $table->text('foto');   // path foto
            $table->string('lokasi');
            $table->string('jam');
            $table->timestamps();

            // Tambahkan foreign key setelah deklarasi kolom user_id
            $table->foreign('user_id')->references('id')->on('karyawans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
