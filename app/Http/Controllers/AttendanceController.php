<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function showAttendance()
    {
        $userId = Auth::id();
        $sevenDaysAgo = now()->subDays(7)->toDateString(); // Ambil data 7 hari terakhir

        // Ambil hanya absensi milik user yang sedang login
        $attendances = Attendance::where('user_id', $userId)
            ->where('login_date', '>=', $sevenDaysAgo)
            ->orderBy('login_date', 'asc')
            ->get();

        // Pastikan login_date dan login_time menjadi objek Carbon
        $attendances->each(function ($attendance) {
            $attendance->login_date = Carbon::parse($attendance->login_date);
            $attendance->login_time = Carbon::parse($attendance->login_time);

            // Pastikan total_login_hours bukan null dan tidak negatif
            $totalHours = abs($attendance->total_login_hours ?? 0);

            // Konversi total jam kerja ke format yang lebih mudah dibaca
            $hours = floor($totalHours);
            $minutes = ($totalHours - $hours) * 60;
            $attendance->formatted_total_hours = "{$hours} jam " . round($minutes) . " menit";
        });

        // Menyiapkan data untuk grafik
        $dataChart = $attendances->groupBy('login_date')->map(function ($day) {
            $totalHours = abs($day->sum('total_login_hours') ?? 0);
            return [
                'tanggal' => $day->first()->login_date->format('d/m/Y'),
                'total_jam' => $totalHours,
            ];
        })->values();

        return view('absen', compact('attendances', 'dataChart'));
    }


    public function store(Request $request)
    {
        $userId = Auth::id();
        $today = now()->toDateString();

        $lastAttendance = Attendance::where('user_id', $userId)
            ->where('login_date', $today)
            ->latest('login_time')
            ->first();

        if ($lastAttendance) {
            $hoursSinceLastLogin = Carbon::parse($lastAttendance->login_time)->diffInHours(now());

            if ($hoursSinceLastLogin < 6) {
                return redirect()->route('absen')->with('error', 'Anda sudah absen hari ini. Coba lagi setelah 6 jam.');
            }

            if ($hoursSinceLastLogin > 7) {
                return redirect()->route('absen')->with('error', 'Batas absensi 7 jam telah terlewati. Coba lagi besok.');
            }
        }

        Attendance::create([
            'user_id' => $userId,
            'condition' => $request->condition,
            'login_date' => $today,
            'login_time' => now()->toTimeString(),
        ]);

        return redirect()->route('absen')->with('success', 'Absensi berhasil!');
    }
}