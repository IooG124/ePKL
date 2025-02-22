<?php
    // Prevent Caching
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Set timezone to Asia/Makassar (Jakarta time)
    date_default_timezone_set('Asia/Makassar');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>JOURNAL SKENSA</title>
</head>
<body class="bg-back box-border">
    <div class="flex min-h-screen flex-col md:flex-row">

        <!-- Mobile Navigation Toggle -->
        <div class="md:hidden bg-blueSide py-4 px-4 text-white flex items-center justify-between">
            <h1 class="text-2xl font-bold tracking-widest uppercase">Journal</h1>
            <label for="menu-toggle" class="cursor-pointer">
                <i class="fi fi-ss-menu-burger text-white text-3xl"></i>
            </label>
        </div>
        <input type="checkbox" id="menu-toggle" class="hidden">

        <!-- Sidebar -->
        <div id="menu-content" class="min-h-screen sticky left-0 top-0 bg-blueSide flex flex-col justify-between text-white py-4 px-4 w-full md:w-[20rem] md:flex md:overflow-hidden transition-transform transform -translate-x-full md:translate-x-0" aria-hidden="true">
            <div class="overflow-y-auto h-full">
                <div class="text-3xl md:text-4xl font-bold tracking-[.5rem] pb-8 pt-[2rem] uppercase text-center">JOURNAL</div>

                <!-- User Profile Display -->
                <div class="flex items-center gap-3 border-b-2 border-b-white pb-6 w-full">
                    <h1 class="text-xl md:text-2xl uppercase tracking-wider">
                        @if(Auth::user()->role->role_name == 'students') <!-- If user is a student -->
                            Hi! {{ Auth::user()->student->name }} <!-- Display student name -->
                        @elseif(Auth::user()->role->role_name == 'teachers') <!-- If user is a teacher -->
                            Hi! {{ Auth::user()->teacher->name }} <!-- Display teacher name -->
                        @else
                            Hi! {{ Auth::user()->name }} <!-- Default to user name if no role match -->
                        @endif
                    </h1> <!-- Display logged-in user's name -->
                </div>

                <!-- Navigation Links Based on Role -->
                @if(Auth::user()->role->role_name == 'students')
                    <div class="flex flex-col gap-2 pt-4">
                        <h1 class="text-xl md:text-2xl font-normal tracking-wider py-2 uppercase">Siswa</h1>
                        <x-link-side href="/absen">
                            <i class="fi fi-ss-face-viewfinder text-xl"></i>
                            <h1 class="text-lg md:text-xl">Absen</h1>
                        </x-link-side>
                        <x-link-side href="/dudi">
                            <i class="fi fi-ss-house-building text-xl"></i>
                            <h1 class="text-lg md:text-xl">Daftar DuDi</h1>
                        </x-link-side>
                        <x-link-side href="{{ route('journals.index') }}">
                            <i class="fi fi-ss-to-do text-xl"></i>
                            <h1 class="text-lg md:text-xl">Jurnal Harian</h1>
                        </x-link-side>
                    </div>
                @elseif(Auth::user()->role->role_name == 'teachers')
                    <div class="flex flex-col gap-2 pt-4">
                        <h1 class="text-xl md:text-2xl font-normal tracking-wider uppercase py-2">Guru</h1>
                        <x-link-side href="{{ route('journals.verifyPage') }}">
                            <i class="fi fi-ss-memo-circle-check text-xl"></i>
                            <h1 class="text-lg md:text-xl">Verifikasi Jurnal</h1>
                        </x-link-side>
                        <x-link-side href="/periode">
                            <i class="fi fi-ss-memo-circle-check text-xl"></i>
                            <h1 class="text-lg md:text-xl">Tambah Periode</h1>
                        </x-link-side>
                    </div>
                @elseif(Auth::user()->role->role_name == 'admin')
                    <div class="flex flex-col gap-2 pt-4">
                        <h1 class="text-xl md:text-2xl font-normal tracking-wider uppercase py-2">Admin</h1>
                        <x-link-side href="/siswa">
                            <i class="fi fi-ss-users-medical text-xl"></i>
                            <h1 class="text-lg md:text-xl">Tambah Siswa</h1>
                        </x-link-side>
                        <x-link-side href="{{ route('teachers.index') }}">
                            <i class="fi fi-ss-employees-woman-man text-xl"></i>
                            <h1 class="text-lg md:text-xl">Tambah Guru</h1>
                        </x-link-side>
                        <x-link-side href="/listDudi">
                            <i class="fi fi-ss-employees-woman-man text-xl"></i>
                            <h1 class="text-lg md:text-xl">Tambah DUDI</h1>
                        </x-link-side>
                    </div>
                @endif
            </div>
            <div>
                <x-link-side href="/Profile">
                    <i class="fi fi-ss-user text-xl"></i>
                    <h1 class="text-lg md:text-xl">Profile</h1>
                </x-link-side>

                <x-link-side href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fi fi-ss-exit text-xl"></i>
                    <h1 class="text-lg md:text-xl">Log Out</h1>
                </x-link-side>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <div class="text-center text-sm text-slate-500 py-4">&copy; 2024 SMK Negeri 1 Denpasar</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col w-full h-full overflow-auto">
            <!-- Top Bar -->
            <div id="top-bar" class="flex flex-row w-full sticky top-0 justify-between items-center px-6 py-4 bg-content shadow-md transition-all duration-300">
                <div>
                    <input type="checkbox" id="menu-toggle" class="hidden">
                    <label for="menu-toggle" class="space-y-1 p-2 block md:hidden">
                        <div class="w-10 h-[5px] bg-gray-700 rounded-full"></div>
                        <div class="w-8 h-[5px] bg-gray-700 rounded-full"></div>
                        <div class="w-6 h-[5px] bg-gray-700 rounded-full"></div>
                    </label>
                </div>
            </div>

            <!-- Page Content -->
            <div class="flex flex-col m-8 bg-content h-full">
                <div class="p-7 overflow-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- Script to toggle sidebar on mobile and hide header -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menuContent = document.getElementById('menu-content');
        const topBar = document.getElementById('top-bar');

        menuToggle.addEventListener('change', function() {
            if (menuToggle.checked) {
                menuContent.classList.remove('-translate-x-full');
                menuContent.classList.add('translate-x-0');
                menuContent.setAttribute('aria-hidden', 'false');
                topBar.classList.add('hidden');  // Hide the top bar
            } else {
                menuContent.classList.remove('translate-x-0');
                menuContent.classList.add('-translate-x-full');
                menuContent.setAttribute('aria-hidden', 'true');
                topBar.classList.remove('hidden');  // Show the top bar again
            }
        });
    </script>
</body>
</html>
