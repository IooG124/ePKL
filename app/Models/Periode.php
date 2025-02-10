<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = ['dudi_id', 'tanggalmulai', 'tanggalberakhir'];

    // Relasi ke Siswa (Many-to-Many)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'periode_student', 'periode_id', 'student_id');
    }

    // Relasi ke DUDI (Many-to-One)
    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'dudi_id');
    }
}