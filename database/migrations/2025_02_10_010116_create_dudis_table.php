<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dudis', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('namadudi'); // Column for company name
            $table->string('lokasi'); // Column for location
            $table->string('contactperson'); // Column for contact person
            $table->timestamps(); // Automatically add created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('dudis'); // Rollback the table creation
    }
};
