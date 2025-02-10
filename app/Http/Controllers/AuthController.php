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

        // Tentukan kolom login (email untuk siswa, username untuk guru/admin)
        $credentials = [];
        if ($request->has('email')) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        } elseif ($request->has('username')) {
            $credentials = ['username' => $request->username, 'password' => $request->password];
        }

        // Cek autentikasi user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah user sudah absen hari ini
            $todayAttendance = Attendance::where('user_id', $user->id)
                ->whereDate('login_date', now()->toDateString())
                ->first();

            if (!$todayAttendance) {
                // Buat absensi baru jika belum ada
                $attendance = Attendance::create([
                    'user_id' => $user->id,
                    'condition' => $request->condition,
                    'login_date' => now()->toDateString(),
                    'login_time' => now()->toTimeString(),
                    'total_login_hours' => 0,  // Set awal 0 karena belum logout
                ]);

                // Simpan ID absensi di session untuk digunakan saat logout
                session(['attendance_id' => $attendance->id]);
            } else {
                // Jika sudah ada absensi, update login_out jika belum diisi
                if (!$todayAttendance->login_out) {
                    $todayAttendance->update(['login_out' => now()->toTimeString()]);
                }
            }

            // **Arahkan sesuai dengan peran pengguna**
            if (Auth::user()->role->role_name == 'teachers') {
                return redirect()->route('siswa')->with('success', 'Login Berhasil sebagai Guru');
            } elseif (Auth::user()->role->role_name == 'admin') {
                return redirect()->route('guru')->with('success', 'Login Berhasil sebagai Admin');
            } else {
                return redirect()->route('absen')->with('success', 'Login Berhasil');
            }
        }

        return back()->withErrors(['login' => 'Email, username, atau password salah']);
    }

    public function logout()
    {
        $user = Auth::user();

        // Ambil attendance_id dari session
        $attendanceId = session('attendance_id');

        if ($attendanceId) {
            // Cari data absensi
            $attendance = Attendance::find($attendanceId);

            if ($attendance && !$attendance->login_out) {
                // Update waktu logout jika belum ada
                $attendance->update([
                    'login_out' => now()->toTimeString(),
                    'total_login_hours' => Carbon::parse($attendance->login_time)->diffInMinutes(now()) / 60, // Hitung total jam kerja
                ]);
            }
        }

        // Logout user
        Auth::logout();

        // Hapus session attendance_id
        session()->forget('attendance_id');

        return redirect('/login');
    }
}