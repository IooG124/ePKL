<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class RoutesController extends Controller {
    public function index()
{
    // Gunakan Auth untuk mendapatkan user yang login
    $user = Auth::user();

    // Pastikan user ada
    if (!$user) {
        return redirect('/login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
    }

    // Ambil data absensi user yang sedang login
    $attendances = Attendance::where('user_id', $user->id)
                             ->orderBy('login_date', 'desc')
                             ->get();

    // Memastikan user memiliki role_id yang sesuai (misalnya 3 untuk role siswa)
    if ($user->role_id == 3) {
        // Mengambil data siswa berdasarkan user_id
        $siswa = $user->siswa;

        // Pastikan siswa ditemukan
        // if (!$siswa) {
        //     return redirect()->route('login')->withErrors(['error' => 'Data siswa tidak ditemukan.']);
        // }

        // Kirim data ke view
        return view('absen', compact('attendances', 'user', 'siswa'));
    }

    // Kalau role tidak sesuai, arahkan ke halaman lain
    // return redirect()->route('login')->withErrors(['error' => 'Role tidak valid.']);
}

    


    

    public function vLogin() {
        return view('login');
    }
    
    public function vAbsen() {
        return view('absen');
    }

    public function vDSiswa() {
        return view('tsiswa');
    }

    public function vDGuru() {
        return view('tguru');
    }

    public function vDUDI() {
        return view('ddudi');
    }

    public function vTambahDUDI() {
      return view('TambahDudi');
  }

    public function vJurnal() {
        return view('jurnal');
    }

    public function vListJurnal() {
      return view('journalList');
  }

    public function vProfile() {
        return view('Profile');
    }

    public function vVerifikasi() {
        return view('verif');
    }
    
    public function vTambahPeriode() {
      return view(view: 'tambahPeriode');
  }

    public function vScan() {
        return view('scanface');
    }
}
