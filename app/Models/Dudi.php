<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table is named 'dudis')
    protected $table = 'dudis';

    // Define which columns are fillable
    protected $fillable = [
        'namadudi',
        'lokasi',
        'contactperson',
    ];
}