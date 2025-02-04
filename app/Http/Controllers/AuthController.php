<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'condition' => 'required|in:WFO,WFH,LAP',
        ]);

        // Cek login user
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();

            // Cek apakah sudah absen hari ini
            $todayAttendance = Attendance::where('user_id', $user->id)
                ->whereDate('login_date', now()->toDateString())
                ->first();

            // Jika sudah ada absensi hari ini
            if ($todayAttendance) {
                // Jika login_out sudah ada, buat data absensi baru
                if ($todayAttendance->login_out) {
                    // Buat absensi baru jika login_out sudah terisi
                    $attendance = Attendance::create([
                        'user_id' => $user->id,
                        'condition' => $request->condition,
                        'login_date' => now()->toDateString(),
                        'login_time' => now()->toTimeString(),
                        'total_login_hours' => 0,
                    ]);

                    // Simpan attendance_id yang baru di session atau cookie
                    session(['attendance_id' => $attendance->id]);
                    // Atau bisa menggunakan cookie
                    // cookie()->queue('attendance_id', $attendance->id, 60);  // expired after 60 minutes
                } else {
                    // Jika login_out belum terisi, update waktu logout
                    $todayAttendance->update(['login_out' => now()->toTimeString()]);
                    session(['attendance_id' => $todayAttendance->id]);
                }
            } else {
                // Jika absensi belum ada, buat absensi baru
                $attendance = Attendance::create([
                    'user_id' => $user->id,
                    'condition' => $request->condition,
                    'login_date' => now()->toDateString(),
                    'login_time' => now()->toTimeString(),
                    'total_login_hours' => 0,
                ]);

                // Simpan attendance_id di session atau cookie
                session(['attendance_id' => $attendance->id]);
                // cookie()->queue('attendance_id', $attendance->id, 60);
            }

            return redirect()->route('absen')->with('success', 'Login Berhasil');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }


    public function logout()
    {
        $user = Auth::user();

        // Ambil attendance_id dari session atau cookie
        $attendanceId = session('attendance_id');
        // Atau jika menggunakan cookie:
        // $attendanceId = cookie('attendance_id');

        if ($attendanceId) {
            // Cari absensi berdasarkan attendance_id
            $attendance = Attendance::find($attendanceId);

            if ($attendance && !$attendance->login_out) {
                // Perbarui login_out jika belum terisi
                $attendance->update(['login_out' => now()->toTimeString()]);
            }
        }

        // Logout user
        Auth::logout();

        // Bersihkan session atau cookie attendance_id setelah logout
        session()->forget('attendance_id');
        // cookie()->queue(cookie()->forget('attendance_id'));

        return redirect('/login');
    }
}
