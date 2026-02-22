<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        //ISI BAGIAN INI SAJA
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->string('judul', 150);
            $table->text('isi');
            $table->enum('status', ['dikirim','diproses','selesai'])->default('dikirim');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};
