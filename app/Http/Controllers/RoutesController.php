<?php 

namespace App\Http\Controllers;

class RoutesController extends Controller{
      public function vLogin(){
            return view('login');
      }
      
      public function vAbsen(){
            return view('absen');
      }
}