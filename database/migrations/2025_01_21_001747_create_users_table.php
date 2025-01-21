<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->unique();
            $table->timestamps();
        });

        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            // Foreign key to roles table
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        // Create students table
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('NIS')->unique();
            $table->string('kelas');
            $table->string('jurusan');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Create teachers table
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('NIP')->unique();
            $table->string('alamat');
            $table->string('telpon');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('students');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
