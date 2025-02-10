<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = ['namasiswa', 'namadudi', 'tanggalmulai', 'tanggalberakhir'];
}