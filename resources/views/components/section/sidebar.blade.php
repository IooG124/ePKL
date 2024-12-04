<div class="h-screen sticky left-0 top-0 bg-blueSide flex flex-col justify-between text-white py-[2rem] px-8 w-[27rem]">
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
            <i class="fi fi-ss-exit text-2xl"></i>
            <h1 class="text-2xl uppercase tracking-[0.3rem]">Log Out</h1>
        </x-link-side>
        <div>
            <p class="text-center text-xs text-slate-500 pt-8">SMK Negeri 1 Denpasar@copyrights </p>
        </div>
    </div>

</div>
