<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang benar
    protected $table = 'students';  // <-- Pastikan ini adalah 'teachers', bukan 'gurus'

    protected $fillable = ['nama_siswa', 'NIS', 'kelas', 'jurusan', 'user_id'];

    // Menentukan kolom yang akan otomatis diisi dengan timestamp
    public $timestamps = true; // ini adalah default, jadi bisa juga dihapus
    
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
