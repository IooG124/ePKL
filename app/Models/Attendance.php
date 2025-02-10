<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    protected $fillable = ['user_id', 'condition', 'login_date', 'login_time', 'login_out', 'total_login_hours'];

    // Menyatakan bahwa login_date adalah tipe tanggal
    protected $dates = ['login_date', 'login_time'];

    // Menyimpan waktu login_out jika ada
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($attendance) {
            if ($attendance->login_time && $attendance->login_out) {
                $login_time = Carbon::parse($attendance->login_time);
                $login_out = Carbon::parse($attendance->login_out);
                $attendance->total_login_hours = $login_out->diffInMinutes($login_time) / 60; // Hitung total jam kerja
            }
        });
    }
}