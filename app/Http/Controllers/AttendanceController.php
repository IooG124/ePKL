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
        $attendances = Attendance::all();

        // Pastikan login_date menjadi objek Carbon
        $attendances->each(function ($attendance) {
            $attendance->login_date = Carbon::parse($attendance->login_date);
            $attendance->login_time = Carbon::parse($attendance->login_time);
        });

        // Menyiapkan data untuk grafik
        $dataChart = $attendances->map(function ($attendance) {
            return [
                'tanggal' => $attendance->login_date->format('d/m/Y'),
                'total_jam' => $attendance->total_login_hours ?? 0,
            ];
        });

        return view('absen', compact('attendances', 'dataChart'));
    }

    public function store(Request $request)
    {
        // Create or update attendance record based on logic
        $attendance = Attendance::create([
            'user_id' => Auth::id(),
            'condition' => $request->condition,
            'login_date' => now()->toDateString(),
            'login_time' => now()->toTimeString(),
        ]);

        return redirect()->route('absen')->with('success', 'Absensi berhasil!');
    }
}