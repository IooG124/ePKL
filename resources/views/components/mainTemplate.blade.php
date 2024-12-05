<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>JOURNAL SKENSA</title>
</head>
<body class="bg-back box-border">
    <div class="flex h-screen">

        {{-- Side Bar --}}
        <div class="h-screen sticky left-0 top-0 bg-blueSide flex flex-col justify-between text-white py-[2rem] px-8 w-[27rem] overflow-hidden">
            <div>
                <div class="text-4xl font-bold tracking-[.5rem] pb-12 pt-[2rem] uppercase text-center">JOURNAL</div>
                <div class="flex items-center gap-3 border-b-2 border-b-white pb-6 w-100 justify-start">
                    {{-- <img src="" alt=""> --}}
                    <div class="w-14 h-14 bg-white rounded-full"></div>
                    <h1 class="text-3xl uppercase tracking-wider">Superadmin</h1>
                </div>
                <div class="flex flex-col gap-1 pt-5">
                    <h1 class="text-2xl font-normal tracking-wider py-2 uppercase">Siswa</h1>
                    <x-link-side href="">
                        <i class="fi fi-ss-face-viewfinder text-3xl"></i>
                        <h1 class="text-2xl">Absen</h1>
                    </x-link-side>
                    <x-link-side href="">
                        <i class="fi fi-ss-house-building text-3xl"></i>
                        <h1 class="text-2xl">Daftar DuDi</h1>
                    </x-link-side>
                    <x-link-side href="">
                        <i class="fi fi-ss-to-do text-3xl"></i>
                        <h1 class="text-2xl">Jurnal Harian</h1>
                    </x-link-side>
                    <x-link-side href="">
                        <i class="fi fi-ss-time-past text-3xl"></i>
                        <h1 class="text-2xl">Histori</h1>
                    </x-link-side>
                </div>
        
                <div class="flex flex-col gap-1 pt-5">
                    <h1 class="text-2xl font-normal tracking-wider uppercase py-2">Guru</h1>
                    <x-link-side href="">
                        <i class="fi fi-ss-users-medical text-3xl"></i>
                        <h1 class="text-2xl">Tambah Siswa</h1>
                    </x-link-side>
                    <x-link-side href="">
                        <i class="fi fi-ss-memo-circle-check text-3xl"></i>
                        <h1 class="text-2xl">Verifikasi Jurnal</h1>
                    </x-link-side>
                </div>
                
                <div class="flex flex-col gap-1 pt-5">
                    <h1 class="text-2xl font-normal tracking-wider uppercase py-2">Admin</h1>
                    <x-link-side href="">
                        <i class="fi fi-ss-employees-woman-man text-3xl"></i>
                        <h1 class="text-2xl">Tambah Guru</h1>
                    </x-link-side>
                </div>
            </div>

            <div>
                <x-link-side href="">
                    <i class="fi fi-ss-user text-3xl"></i>
                    <h1 class="text-2xl">Profile</h1>
                </x-link-side>
                <x-link-side href="" >
                    <i class="fi fi-ss-exit text-3xl"></i>
                    <h1 class="text-2xl">Log Out</h1>
                </x-link-side>
                <div>
                    <p class="text-center text-cpy text-slate-500 pt-8">&copy; 2024 SMK Negeri 1 Denpasar</p>
                </div>
            </div>
        
        </div>
        

      <div class="flex flex-col w-full h-full overflow-auto">

        <div class="flex flex-row w-full sticky top-0 justify-between items-center px-10 py-6 bg-content shadow-md">
            <div>
                <input type="checkbox" id="menu-toggle" class="hidden">
                <label for="menu-toggle" class="space-y-1 p-2 block">
                    <div class="w-10 h-[5px] bg-gray-700 transition-all duration-300 rounded-full"></div>
                    <div class="w-8 h-[5px] bg-gray-700 transition-all duration-300 rounded-full"></div>
                    <div class="w-6 h-[5px] bg-gray-700 transition-all duration-300 rounded-full"></div>
                </label>
            </div>
            <div class="flex gap-6 items-center bg-gray-300 px-6 transition duration-300 rounded-lg">
                {{-- Buat search dengan js --}}
                <label for="search" class="pt-2">
                    <i class="fi fi-rr-search text-3xl"></i>
                </label>
                <input type="text" id="search"
                    class="w-[22rem] text-xl h-14 bg-inherit focus:outline-none focus:ring-0 focus:border-transparent placeholder:text-slate-500 "
                    placeholder="Search">
            </div>
        </div>
        

          <div class="flex m-8 bg-content h-full">
            {{-- Content --}}
              <div class="p-7 overflow-y-scroll">
                  {{ $slot }}
              </div>
          </div>
      </div>
  </div>
</body>
</html>