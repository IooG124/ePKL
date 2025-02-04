<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang benar
    protected $table = 'teachers';  // <-- Pastikan ini adalah 'teachers', bukan 'gurus'

    protected $fillable = ['nama_guru', 'NIP', 'alamat', 'telpon', 'user_id'];

    // Menentukan kolom yang akan otomatis diisi dengan timestamp
    public $timestamps = true; // ini adalah default, jadi bisa juga dihapus
    
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
