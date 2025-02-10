<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dudi_id')->constrained('dudis')->onDelete('cascade');
            $table->date('tanggalmulai');
            $table->date('tanggalberakhir');
            $table->timestamps();
        });

        // Tabel pivot periode_student untuk Many-to-Many
        Schema::create('periode_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periode_student'); // Hapus tabel pivot dulu
        Schema::dropIfExists('periodes');
    }
};