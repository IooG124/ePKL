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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('NIP')->unique();
            $table->string('alamat');
            $table->string('telpon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_guru');
    }
};