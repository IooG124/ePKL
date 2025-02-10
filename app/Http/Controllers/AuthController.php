<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required_without:email|string',
            'email' => 'required_without:username|email',
            'password' => 'required|string',
            'condition' => 'required|in:WFO,WFH,LAP',
        ]);

        // Tentukan kolom yang digunakan untuk login (email untuk siswa, username untuk guru)
        $credentials = [];
        if ($request->has('email')) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        } elseif ($request->has('username')) {
            $credentials = ['username' => $request->username, 'password' => $request->password];
        }

        // Cek login user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah sudah absen hari ini
            $todayAttendance = Attendance::where('user_id', $user->id)
                ->whereDate('login_date', now()->toDateString())
                ->first();

            if (!$todayAttendance) {
                // Jika tidak ada absensi hari ini, buat data absensi baru
                Attendance::create([
                    'user_id' => $user->id,
                    'condition' => $request->condition,
                    'login_date' => now()->toDateString(),
                    'login_time' => now()->toTimeString(),
                    'total_login_hours' => 0,  // Belum ada waktu logout, jadi 0
                ]);
            } else {
                // Jika sudah ada absensi, Anda bisa melakukan logika lain (misalnya, update waktu logout)
                if (!$todayAttendance->login_out) {
                    $todayAttendance->update(['login_out' => now()->toTimeString()]);
                }
            }

            return redirect()->route('absen')->with('success', 'Login Berhasil');
        }

        return back()->withErrors(['login' => 'Email, username, atau password salah']);
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