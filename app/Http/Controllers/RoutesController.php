<?php 

namespace App\Http\Controllers;

class RoutesController extends Controller{
      public function vLogin(){
            return view('login');
      }
      
      public function vAbsen(){
            return view('absen');
      }

      public function vDSiswa(){
            return view('tsiswa');
      }

      public function vDGuru(){
            return view('tguru');
      }

      public function vDUDI(){
            return view('ddudi');
      }

      public function vJurnal(){
            return view('jurnal');
      }

      public function vProfile(){
            return view('Profile');
      }

      public function vVerifikasi(){
            return view('verif');
      }
}