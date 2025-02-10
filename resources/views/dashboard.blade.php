<!DOCTYPE html>
<html lang="en" class="scroll-smooth" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL: SMK Negeri 1 Denpasar</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--Box Icon-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--Link template-->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include AOS library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2196F3',
                    }
                }
            }
        }
        // Initialize AOS
        AOS.init();
    </script>
</head>
<body class="font-montserrat">
    <!-- Navbar -->
    <nav class="flex justify-between items-center px-6 py-2 bg-blue-900 lg:px-20 text-white font-medium relative z-10 sticky top-0 backdrop-blur-lg transition-all">
        <button class="lg:hidden text-3xl focus:outline-none" id="menu-btn">☰</button>
        <div class="hidden lg:flex space-x-8 mt-4 mb-4">
        <a href="#hero" class="hover:text-teal-300 transition-colors font-semibold">Beranda</a>
        <a href="#mou" class="hover:text-teal-300 transition-colors font-semibold">MoU</a>
        <a href="#sistempkl" class="hover:text-teal-300 transition-colors font-semibold">Sistem PKL</a>
        <a href="#profile" class="hover:text-teal-300 transition-colors font-semibold">Profil PKL</a>
        <a href="#faq" class="hover:text-teal-300 transition-colors font-semibold">FAQ</a>
      </div>
      <a href="/login" class="hidden lg:block bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors font-bold">JURNAL</a>
      <!-- Mobile Menu -->
      <div class="absolute top-16 left-1/2 transform -translate-x-1/2 w-11/12 max-w-md backdrop-blur-md bg-blue-800/80 py-6 hidden flex-col items-center space-y-4 text-white text-lg shadow-lg rounded-lg lg:hidden z-20" id="mobile-menu">        
        <a href="#hero" class="block py-2 w-full text-center hover:bg-blue-700">Beranda</a>
        <a href="#mou" class="block py-2 w-full text-center hover:bg-blue-700">MoU</a>
        <a href="#sistempkl" class="block py-2 w-full text-center hover:bg-blue-700">Sistem PKL</a>
        <a href="#profile" class="block py-2 w-full text-center hover:bg-blue-700">Profil PKL</a>
        <a href="#faq" class="block py-2 w-full text-center hover:bg-blue-700">FAQ</a>
        <a href="/login" class="block py-3 w-3/4 max-w-xs mx-auto bg-primary text-white text-center rounded-lg hover:bg-blue-600">JURNAL</a>      
      </div>
    </nav>

  <!--& Hero Section-->
  <section class="bg-blue-900 py-12 relative">
    <!-- Hero Section -->
    <div class="relative flex flex-col-reverse lg:flex-row items-center mt-0 px-6 lg:px-20 gap-12" id="hero" data-aos="fade-up">
      <!-- Bagian Teks -->
      <div class="text-center lg:text-left lg:w-1/2" data-aos="fade-right">
        <h1 class="text-4xl lg:text-5xl text-white font-bold leading-tight">
          PKL SMKN 1 Denpasar: Wadah <span class="text-teal-300">Prestasi</span> dan Pengalaman <span class="text-teal-300">Nyata</span>
        </h1>
        <p class="mt-6 text-white text-lg leading-relaxed" data-aos="fade-left">
          Temukan informasi lengkap seputar Program Praktik Kerja Lapangan (PKL) SMKN 1 Denpasar. <span class="underline decoration-2 underline-offset-4 decoration-teal-300">Siswa mendapatkan pengalaman langsung di dunia industri</span> untuk mengasah keterampilan dan meningkatkan kompetensi. Jadikan PKL <span class="underline decoration-2 underline-offset-4 decoration-teal-300">langkah awal menuju masa depan yang gemilang!</span>
        </p>
        <a href="form.html" class="mt-8 inline-block bg-primary text-white px-8 py-3 text-lg font-medium rounded-lg shadow-md hover:bg-blue-600 transition-all transform hover:-translate-y-1" data-aos="zoom-in">
          Dokumentasi E-PKL
        </a>
      </div>
      <!-- Bagian Gambar -->
      <div class="lg:w-1/2 flex justify-center relative z-0" data-aos="zoom-in" data-aos-duration="1000">
        <img src="assets/images/gif-bg-hero.gif" alt="Logo SMKN 1 Denpasar" class="w-full max-w-sm md:max-w-md lg:max-w-lg object-contain">
      </div>
    </div>
  <!-- Scroll Down Indicator -->
<a href="#mou" id="scroll-down" class="absolute bottom-8 right-8 flex flex-col items-center lg:block hidden">
  <div class="w-10 h-10 flex items-center justify-center border-2 border-white rounded-full animate-bounce mt-2 glow-effect">
    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
    </svg>
  </div>
</a>

  </section>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
          duration: 1000,
          once: true  
        });
    </script>


      <!-- Bagian Informasi -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-10 mt-12 px-6 lg:px-20 mb-16" data-aos="fade-up">
  <div class="text-center transform hover:scale-105 transition-transform cursor-pointer" data-aos="fade-right">
      <p class="text-4xl font-bold text-primary" id="moUCount">0</p>
      <p class="text-gray-600 font-semibold mt-2">MoU</p>
  </div>
  <div class="text-center transform hover:scale-105 transition-transform cursor-pointer" data-aos="fade-up">
      <p class="text-4xl font-bold text-primary" id="siswaCount">0</p>
      <p class="text-gray-600 font-semibold mt-2">Siswa/i</p>
  </div>
  <div class="text-center transform hover:scale-105 transition-transform cursor-pointer" data-aos="fade-left">
      <p class="text-4xl font-bold text-primary" id="ulasanCount">0</p>
      <p class="text-gray-600 font-semibold mt-2">Ulasan</p>
  </div>
  <div class="text-center transform hover:scale-105 transition-transform cursor-pointer" data-aos="fade-left">
      <p class="text-4xl font-bold text-primary" id="pencapaianCount">0</p>
      <p class="text-gray-600 font-semibold mt-2">Pencapaian</p>
  </div>
</div>

<!-- Tentang E-PKL Section -->
<section class="" id="mou" data-aos="fade-up" data-aos-duration="1000">
  <div class="text-center mb-12 px-4 sm:px-6 lg:px-8" id="mou">
    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight" data-aos="zoom-in">
        Tentang <span class="text-teal-400">PKL SMKN 1 Denpasar</span>
    </h2>
    <p class="mt-4 text-gray-600 text-base sm:text-lg lg:text-xl max-w-3xl mx-auto" data-aos="zoom-in" data-aos-delay="100">
        <span class="underline decoration-2 underline-offset-4 decoration-sky-500">Praktek Kerja Lapangan (PKL)</span> adalah kegiatan belajar di luar kelas yang dilakukan oleh siswa di tempat kerja tertentu. PKL merupakan salah satu <span class="underline decoration-2 underline-offset-4 decoration-sky-500">kegiatan wajib</span> yang memberikan <span class="underline decoration-2 underline-offset-4 decoration-sky-500">pengalaman kerja langsung</span> kepada siswa SMK.
    </p>
  </div>
  
</section>

      
<!--Image with Pop Up / MOU-->

<section class="relative w-full overflow-hidden p-5">
  <d id="slider" class="flex w-max space-x-4">
    <!-- Gambar diulang agar animasi berjalan mulus -->
    <div class="slider">
      <img src="assets/images/Mitra/PT. Indo Apps Solusindo.png" alt="Indo Apps"
        class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
        onclick="openPopup('PT INDO APPS SOLUSINDO', 'Perusahaan ini bergerak dalam bidang IT.', 'Jl. Ganetri IV No.4, Tonja, Kec. Denpasar Utara, Kota Denpasar, Bali 80237', 'Front End Developer, Marketing, Content Producer', 'assets/images/Mitra/PT. Indo Apps Solusindo.png')">
    </div>

    <div class="slider">
      <img src="assets/images/Mitra/Atrem Project.png" alt="Atrem Project"
        class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
        onclick="openPopup('Atrem Project', 'Atrem Project adalah Digital Agency yang berasal dari Bali, Indonesia. Berfokus pada perancangan dan pengembangan aplikasi digital berbasis Website dan Mobile,', 'Jl. Ahmad Ayani Gg.Anugrah VII No.17, Peguyangan, Kec.DenpasarUtara, Kota Denpasar, Bali 80239', 'Front-end Dev, Back-end Dev, Technical Support', 'assets/images/Mitra/Atrem Project.png')">
    </div>
    
    <div class="slider">
      <img src="assets/images/Mitra/CV. Avatar Solutions.jpeg" alt="CV. Avatar Solutions"
        class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
        onclick="openPopup('CV. Avatar Solutions', 'perusahaan yang bergerak di bidang teknologi informasi dan komunikasi (ICT)', 'Jl.Seroja	No.36,	Tonja,	Denpasar, Kota	Denpasar, Bali 80239', 'Helpdesk , IT SUpport , Outsourcing', 'assets/images/Mitra/CV. Avatar Solutions.jpeg')">
    </div>

    <div class="slider">
      <img src="assets/images/Mitra/Bali Solution Biz.png" alt="Bali Solution Biz"
        class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
        onclick="openPopup('Bali Solution Biz', 'Perusahaan dari Bali yang bergerak di bidang system informasi dan pelayanan solusi dalam optimalisasi penggunaan Informasi Teknologi', 'Jl. Suli No.87, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80234', 'Software Engineering, Website Development', 'assets/images/Mitra/Bali Solution Biz.png')">
    </div>
    <div class="slider">
      <img src="assets/images/Mitra/BlueCreative.jpeg" alt="Blue	Creative"
        class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
        onclick="openPopup('Blue	Creative', 'Perusahaan ini bergerak dalam bidang Jasa Website Bali.', 'Jl. Monkey Forest	No.88, Ubud, Kecamatan	Ubud, Kabupaten	Gianyar, Bali 80571', 'Front End Developer, Marketing, Content Producer', 'assets/images/Mitra/BlueCreative.jpeg')">
    </div>

    <div class="slider">
      <img src="assets/images/Mitra/PT. Bina Taruna Wiratama.png" alt="PT. Bina Taruna Wiratama"
        class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
        onclick="openPopup('PT. Bina Taruna Wiratama', 'Perusahaan Edukasi berbasis teknologi informasi', 'Jl. Bypass Ngurah	Rai	No.176,	Sanur Kaja, Denpasar Selatan, Kota Denpasar,	Bali	80228', 'Bimbel, IT Support, Software Engineering', 'assets/images/Mitra/PT. Bina Taruna Wiratama.png')">
    </div>

  <div class="slider">
    <img src="assets/images/Mitra/Hotel Indigo Seminyak.jpeg" alt="Hotel Indigo Seminyak"
      class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
      onclick="openPopup('Hotel Indigo Seminyak', 'Hotel yang menyediakan lowongan bagi IT Support dalam pengembangan App ataupun web.', 'Jl. Camplung Tanduk No.10, Seminyak, Bali, Kabupaten	Badung,	Bali 80361', 'IT Support', 'assets/images/Mitra/Hotel Indigo Seminyak.jpeg')">
  </div>

<div class="slider">
  <img src="assets/images/Mitra/CV. Magnum Solusion.jpeg" alt="CV. Magnum Solusion"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('CV. Magnum Solusion', 'Perusahaan IT yang bergerak dalam penyediaan solusi teknologi informasi dan elektronik.', 'Jl. Sedap Malam No.99, Kesiman, Kec. Denpasar Timur., Kota Denpasar, Bali 80237', 'Software Engineering, Remote Jobs', 'assets/images/Mitra/CV. Magnum Solusion.jpeg')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Timedoor Indonesia.png" alt="PT. Timedoor Indonesia"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Timedoor Indonesia', 'perusahaan teknologi yang bergerak di bidang pengembangan aplikasi web dan mobile, pendidikan IT, dan pelatihan vokasional', 'Jl. Tukad	Yeh	Aya	IX	No.46, Renon, Denpasar Selatan, Kota Denpasar,	Bali 80226', 'Pengembangan Web, Aplikasi Mobile, Marketing', 'assets/images/Mitra/PT. Timedoor Indonesia.png')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/Destar Studio.png" alt="Destar Studio"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('Destar Studio', 'Perusahaan yang bergerak dibidang IT dan juga Design', 'Jl. Tegal Gumuh, Darmasaba, Kec. Abiansemal,	Kabupaten Badung, Bali 80352', 'Design, Software Engineering', 'assets/images/Mitra/Destar Studio.png')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Taksu Teknologi Indonesia.jpeg" alt="PT. Taksu Teknologi Indonesia"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Taksu Teknologi Indonesia', 'Perusahaan yang menyediakan Teknologi stuido Fokus untuk Mobile Apps dan Website.', 'Jl.Cokroaminoto No.394, Ubung Kaja, Denpasar Utara, Kota Denpasar, Bali	80115', 'IT Support, Software Engineering', 'assets/images/Mitra/PT. Taksu Teknologi Indonesia.jpeg')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Balitop Digima Solutions.jpeg" alt="PT. Balitop Digima Solutions"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Bali Top Digima Solutions', 'Perusahaan ini menyediakan Kursus Komputer dan Digital Marketing', 'Jl. Kunti No.3, Dangin Puri Kauh, Kec. Denpasar Utara, Kota Denpasar, Bali 80231', 'IT Support, Digital Marketing', 'assets/images/Mitra/PT. Balitop Digima Solutions.jpeg')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Studio Kami Mandir.png" alt="PT. Studio Kami Mandir"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Studio Kami Mandiri', 'Berpengalaman menyediakan Aplikasi, web, aplikasi Desktop dan mobile.', 'Jl. Thamrin No.31, Pemecutan,	Kec. Denpasar Bar., Kota Denpasar, Bali 80119', 'Multimedia Graphic Designer', 'assets/images/Mitra/PT. Studio Kami Mandir.png')">
</div>

<div class="slider flex justify-center items-center">
  <img src="assets/images/Mitra/PT. Bamboomedia Cipta Persada.png" alt="PT. Bamboomedia Cipta Persada"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Bamboomedia Cipta Persada', 'Perusahaan yang bergerak di bidang industri kreatif dan teknologi informasi. ', 'Jl. Merdeka No.45, Renon, Denpasar Selatan, Kota Denpasar,Bali 80235', 'Bisnis Piranti Lunak Kreatif', 'assets/images/Mitra/PT. Bamboomedia Cipta Persada.png')">
</div>


<div class="slider">
  <img src="assets/images/Mitra/PT. Miracle Grup Indonesia.jpeg" alt="PT. Miracle Grup Indonesia"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Miracle Grup Indonesia', 'Perusahaan yang bergerak di bidang media, kreatif, binatu, dan ritel makanan minuman.', 'Jl. Tukad Badung XV No.4, Renon, Denpasar Selatan, Kota Denpasar,	Bali 80000', 'Bussines, IT Support', 'assets/images/Mitra/PT. Miracle Grup Indonesia.jpeg')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Blue Lake Indonesia.jpeg" alt="PT. Blue Lake Indonesia"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Blue Lake Indonesia', 'Perusahaan bioteknologi yang mengembangkan vaksin intranasal', 'Jl. Tukad	Languan	No.20, Panjer, Denpasar	Selatan, Kota Denpasar,	Bali 80234', 'IT Support, Software Engineering', 'assets/images/Mitra/PT. Blue Lake Indonesia.jpeg')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Foxbyte Global Inovasi.jpeg" alt="PT. Foxbyte Global Inovasi"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Foxbyte Global Inovasi', 'Menyediakan Layanan Servis untuk Software Development, including App, etc.', 'Jl. Soka No.40C,	Kesiman	Kertalangu,	Kec. Denpasar Tim.,	Kota Denpasar, Bali	80237', 'Back-End Developer, Front-End Developer, IT Support', 'assets/images/Mitra/PT. Foxbyte Global Inovasi.jpeg')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT. Ngantre Indonesia Persada.png" alt="PT. Ngantre Indonesia Persada"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT. Ngantre Indonesia Persada', 'Perusahaan Starup yang bergerak dalam jasa Teknologi Informasi.', 'Jl. Gatot	Subroto	Barat No.108x, Pemecutan Kaja, Kec.	Denpasar Utara,	Denpasar Utara,	Bali 80116', 'Marketing, Technical Support', 'assets/images/Mitra/PT. Ngantre Indonesia Persada.png')">
</div>

<div class="slider">
  <img src="assets/images/Mitra/PT.Hooki Global Kreasi.png" alt="PT.Hooki Global Kreasi"
    class="w-24 sm:w-32 md:w-36 lg:w-40 h-auto rounded-lg cursor-pointer transition-transform hover:scale-110"
    onclick="openPopup('PT.Hooki Global Kreasi', 'Perusahaan rintisan yang bergerak di bidang social gathering dan crowd funding. ', 'Jl. Gatot Subroto	Barat No.388b, Pemecutan Kaja, Kec.	Denpasar Utara,	Kota Denpasar, Bali 80111', 'E-Learning, Computer Based Test System', 'assets/images/Mitra/PT.Hooki Global Kreasi.png')">
</div>
</section>

<!-- Pop-up -->
<div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 p-4">
  <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl max-h-[75vh] overflow-auto relative flex flex-col items-center">
    <img id="popup-img" src="" class="w-1/2 max-w-[200px] rounded-lg object-contain">
    <h2 id="popup-title" class="text-lg text-blue-500 font-bold mt-3 text-center"></h2>
    <p id="popup-description" class="text-gray-600 mt-2 text-sm text-center"></p>
    <p id="popup-address" class="text-gray-600 mt-2 text-sm text-center"></p>
    <p id="popup-positions" class="font-bold mt-2 text-sm text-center"></p>
    
    <!-- Tombol Tutup -->
    <button onclick="closePopup()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-900 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>
</div>





<!--Image with Pop Up / MOU END -->


<!-- About PKL -->
<section class="bg-blue-900 py-12 mt-12" id="profile" data-aos="fade-up" data-aos-duration="1000">
  <div class="flex flex-col lg:flex-row items-center px-6 lg:px-20 gap-12">
      <div class="lg:w-1/2 aspect-video bg-gray-200 rounded-lg overflow-hidden" data-aos="zoom-in">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/YgQ2QUou9ec" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="lg:w-1/2 text-center lg:text-left" data-aos="fade-left">
          <h2 class="text-4xl lg:text-5xl text-white font-bold leading-tight"><span class="text-teal-400">Profil PKL:</span> SMKN 1 Denpasar</h2>
          <p class="mt-6 text-white text-lg leading-relaxed" data-aos="fade-left" data-aos-delay="100">
              Tonton video profil untuk <span class="underline decoration-2 underline-offset-4 decoration-teal-300">mengetahui lebih lanjut tentang Program Praktik Kerja Lapangan (PKL) di SMK Negeri 1 Denpasar.</span> Dapatkan informasi lengkap mengenai <span class="underline decoration-2 underline-offset-4 decoration-teal-300">pengalaman, manfaat, dan kesempatan</span> yang ditawarkan oleh program ini.
          </p>
          <a href="https://youtu.be/YgQ2QUou9ec" target="_blank" class="mt-8 inline-block bg-primary text-white px-8 py-3 text-lg font-medium rounded-lg shadow-md hover:bg-blue-600 transition-all transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="200">
              Tonton
          </a>
      </div>
  </div>
</section>


<!--SISTEM PKL-->
<section id="sistempkl" class="m-4 md:m-8">
  <div class="container mx-auto p-4 my-6 space-y-4 text-center" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold">
        Sistem E-PKL <span class="text-teal-400">SKENSA</span>
    </h2>
    <p class="dark:text-gray-600 text-base sm:text-lg lg:text-xl max-w-3xl lg:max-w-4xl mx-auto text-center">
        <span class="underline decoration-2 underline-offset-4 decoration-sky-500">Platform digital</span> untuk mempermudah pelaksanaan PKL <span class="underline decoration-2 underline-offset-4 decoration-sky-500">bagi peserta didik, perusahaan, dan sekolah.</span>
    </p>
  </div>
  
  <div class="container mx-auto grid justify-center gap-4 sm:grid-cols-2 lg:grid-cols-3" data-aos="fade-in" data-aos-duration="1200">
      <div class="flex flex-col items-center p-3 border border-teal-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-100 transition" data-aos="zoom-in" data-aos-duration="800" data-aos-anchor-placement="top-bottom">
          <i class="bx bxs-user-check text-4xl dark:text-violet-600"></i>
          <h3 class="my-3 text-3xl font-semibold hover:text-teal-300 transition duration-300">Pendaftaran Online</h3>
          <div class="space-y-1 leading-snug text-center">
              <p>Mudah dan praktis</p>
              <p>Verifikasi data otomatis</p>
              <p>Terintegrasi dengan sekolah</p>
          </div>
      </div>

      <div class="flex flex-col items-center p-3 border border-teal-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-100 transition" data-aos="zoom-in" data-aos-duration="900">
          <i class="bx bxs-report text-4xl dark:text-violet-600"></i>
          <h3 class="my-3 text-3xl font-semibold hover:text-teal-300 transition duration-300">Monitoring Kegiatan</h3>
          <div class="space-y-1 leading-snug text-center">
              <p>Laporan harian</p>
              <p>Pantauan progres PKL</p>
              <p>Evaluasi dari pembimbing</p>
          </div>
      </div>

      <div class="flex flex-col items-center p-3 border border-teal-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-100" data-aos="zoom-in" data-aos-duration="1000">
          <i class="bx bxs-notepad text-4xl dark:text-violet-600"></i>
          <h3 class="my-3 text-3xl font-semibold hover:text-teal-300 transition duration-300">Sertifikat Digital</h3>
          <div class="space-y-1 leading-snug text-center">
              <p>Validasi otomatis</p>
              <p>Bisa diunduh kapan saja</p>
              <p>Berlaku secara resmi</p>
          </div>
      </div>

      <div class="flex flex-col items-center p-3 border border-teal-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-100 " data-aos="zoom-in" data-aos-duration="1100">
          <i class="bx bx-edit-alt text-4xl dark:text-violet-600"></i>
          <h3 class="my-3 text-3xl font-semibold hover:text-teal-300 transition duration-300">Penilaian Otomatis</h3>
          <div class="space-y-1 leading-snug text-center">
              <p>Penilaian berbasis kinerja</p>
              <p>Evaluasi dari industri</p>
              <p>Transparan dan objektif</p>
          </div>
      </div>

      <div class="flex flex-col items-center p-3 border border-teal-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-100 " data-aos="zoom-in" data-aos-duration="1200">
          <i class="bx bxs-copy-alt text-4xl dark:text-violet-600"></i>
          <h3 class="my-3 text-3xl font-semibold hover:text-teal-300 transition duration-300">Dokumentasi PKL</h3>
          <div class="space-y-1 leading-snug text-center">
              <p>Upload laporan dan foto</p>
              <p>Penyimpanan cloud</p>
              <p>Akses kapan saja</p>
          </div>
      </div>

      <div class="flex flex-col items-center p-3 border border-teal-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-100 transition " data-aos="zoom-in" data-aos-duration="1300">
          <i class="bx bxs-face text-4xl dark:text-violet-600"></i>
          <h3 class="my-3 text-3xl font-semibold hover:text-teal-300 transition duration-300">Database Alumni</h3>
          <div class="space-y-1 leading-snug text-center">
              <p>Jejak karir alumni</p>
              <p>Koneksi industri</p>
              <p>Peluang kerja setelah PKL</p>
          </div>
      </div>
  </div>
</section>



   <!-- faq start -->
<section class="py-12 bg-white px-6 lg:px-20" id="faq" data-aos="fade-up" data-aos-duration="1000">
  <div class="flex flex-col lg:flex-row items-center gap-12">
    <!-- Left Content -->
    <div class="lg:w-1/2" data-aos="fade-right">
      <h2 class="text-3xl lg:text-4xl font-bold mb-6 leading-snug">
        Ketahui lebih dalam tentang <span class="text-teal-400">PKL SMKN 1 Denpasar!</span>
      </h2>
      <p class="text-gray-600 text-lg leading-relaxed mb-6" data-aos="fade-right" data-aos-delay="100">
        Temukan <span class="underline decoration-2 underline-offset-4 decoration-sky-500">informasi lengkap seputar Program Praktik Kerja Lapangan (PKL) SMKN 1 Denpasar.</span> Siswa mendapatkan pengalaman langsung di dunia industri untuk <span class="underline decoration-2 underline-offset-4 decoration-sky-500">mengasah keterampilan dan meningkatkan kompetensi.</span> Jadikan PKL langkah awal menuju masa depan yang gemilang!
      </p>
      <a href="/login"
        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 font-medium text-lg " data-aos="zoom-in" data-aos-delay="200">
        Kunjungi
      </a>
    </div>

    <!-- Right Content (Accordion) -->
    <div class="lg:w-1/2" data-aos="fade-left">
      <div class="space-y-4" id="faq-container">
        <!-- Accordion Item 1 -->
        <details class="group" data-aos="fade-up">
          <summary class="bg-blue-500 text-white px-6 py-4 rounded-lg cursor-pointer flex justify-between items-center">
            Bagaimana sistem PKL SKENSA?
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <div class="mt-2 px-6 text-gray-700 font-light">
            Sistem PKL SKENSA dirancang untuk memberikan pengalaman kerja langsung kepada siswa dengan kerja sama industri.
          </div>
        </details>

        <!-- Accordion Item 2 -->
        <details class="group" data-aos="fade-up" data-aos-delay="100">
          <summary class="bg-blue-500 text-white px-6 py-4 rounded-lg cursor-pointer flex justify-between items-center">
            Mengapa PKL dikatakan penting?
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <div class="mt-2 px-6 text-gray-700">
            PKL membantu siswa mengasah keterampilan, pengalaman industri, dan kesiapan kerja.
          </div>
        </details>

        <!-- Accordion Item 3 -->
        <details class="group" data-aos="fade-up" data-aos-delay="200">
          <summary class="bg-blue-500 text-white px-6 py-4 rounded-lg cursor-pointer flex justify-between items-center">
            Apa saja manfaat dari PKL?
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <div class="mt-2 px-6 text-gray-700">
            PKL memberikan pengalaman kerja nyata, membangun relasi industri, dan meningkatkan keterampilan.
          </div>
        </details>

        <!-- Accordion Item 4 -->
        <details class="group" data-aos="fade-up" data-aos-delay="300">
          <summary class="bg-blue-500 text-white px-6 py-4 rounded-lg cursor-pointer flex justify-between items-center">
            Bagaimana cara mengisi JURNAL PKL?
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <div class="mt-2 px-6 text-gray-700">
            Jurnal PKL diisi berdasarkan aktivitas harian siswa selama menjalani praktik kerja lapangan.
          </div>
        </details>
      </div>
    </div>
  </div>
</section>



      <!--Footer Starts-->
      <footer class="relative bg-blueGray-100 pt-8 pb-6 ">
        <div class="container mx-auto px-2">
          <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-2">
              <h4 class="text-5xl fonat-bold text-blueGray-700 font-semibold">E-PKL <span class="text-teal-400">SKENSA</span></h4>
              <h5 class="text-base mt-2 mb-2 text-blueGray-600">
              Melihat, Mengamati, Memodifikasi, dan Menciptakan Karya. Temukan kami di berbagai platform.
              </h5>
              <div class="mt-6 lg:mb-0 mb-6 flex gap-x-3">
                <!--Instagram-->
                <a href="https://www.instagram.com/smkn1denpasar/?hl=en" target="_blank" rel="noopener noreferrer">
                  <button class="bg-white text-yellow-500 shadow-lg font-normal h-12 w-12 flex items-center justify-center rounded-full outline-none focus:outline-none transition-all duration-300 hover:bg-yellow-100">
                      <i class='bx bxl-instagram-alt text-xl'></i>
                  </button>
              </a>
              <!--Facebook-->
                <a href="https://www.facebook.com/smknegeri1denpasar/?locale=id_ID" target="_blank" rel="noopener noreferrer">
                  <button class="bg-white text-blue-500 shadow-lg font-normal h-12 w-12 flex items-center justify-center rounded-full outline-none focus:outline-none transition-all duration-300 hover:bg-blue-100">
                    <i class='bx bxl-facebook-circle text-xl'></i>
                  </button>
              </a>
              <!--Website-->
                <a href="https://www.smkn1denpasar.sch.id/berita-103" target="_blank" rel="noopener noreferrer">
                  <button class="bg-white text-green-400 shadow-lg font-normal h-12 w-12 flex items-center justify-center rounded-full outline-none focus:outline-none transition-all duration-300 hover:bg-green-100">
                    <i class='bx bxl-google text-xl'></i>
                  </button>
              </a>
              <!--YouTube-->
                <a href="https://www.youtube.com/channel/UC_0Bxts_HnLNPrUSDwcR9ZA" target="_blank" rel="noopener noreferrer">
                  <button class="bg-white text-red-700 shadow-lg font-normal h-12 w-12 flex items-center justify-center rounded-full outline-none focus:outline-none transition-all duration-300 hover:bg-red-100">
                    <i class='bx bxl-youtube text-xl'></i>
                  </button>
              </a>
              
            </div>
            
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 px-4 ml-auto">
                  <span class="block uppercase text-teal-400 text-sm font-semibold mb-2">Informasi</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#hero">Beranda</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#mou">MoU</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#profile">Profil E-PKL</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#sistempkl">Sistem E-PKL</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#faq">FAQ</a>
                    </li>
                  </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                  <span class="block uppercase text-teal-400 text-sm font-semibold mb-2">Lainnya</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.smkn1denpasar.sch.id/berita-103">Website SKENSA</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.instagram.com/smkn1denpasar/?hl=en">Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-6 border-blueGray-300">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                Copyright © <span id="get-current-year">2025</span><a href="#" class="text-blueGray-500 hover:text-gray-800" target="_blank"> E-PKL by
                <a href="https://www.creative-tim.com?ref=njs-profile" class="text-blueGray-500 hover:text-blueGray-800">RPL</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    
    
      
      
      

       
    <script>

      // animate untuk number
  // Fungsi untuk menghitung angka dari 0 ke target
  function countUp(elementId, target, duration) {
          let start = 0;
          const increment = target / (duration / 10);
          const element = document.getElementById(elementId);
          const interval = setInterval(() => {
            start += increment;
            if (start >= target) {
              element.textContent = target;
              clearInterval(interval);
            } else {
              element.textContent = Math.floor(start);
            }
          }, 10);
        }


      // Responsive Navbar
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');

    // Toggle antara ikon hamburger dan ikon silang
    if (menuBtn.textContent === "☰") {
        menuBtn.textContent = "✕"; // Ubah ke ikon silang
    } else {
        menuBtn.textContent = "☰"; // Kembali ke ikon hamburger
    }
});

// Tampilan Navbar ketika Scroll
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('nav');
    if (window.scrollY > 10) {
      navbar.classList.add('bg-blue-300/50', 'backdrop-blur-md');  // Efek blur saat scroll
    } else {
      navbar.classList.remove('bg-blue-300/50', 'backdrop-blur-md');  // Kembali ke keadaan semula
    }
  });

// Mou Start
// Slider Animation
const slider = document.getElementById("slider");
let scrollAmount = 0;
let speed = 0.5; // Sesuaikan kecepatan animasi
let maxScroll = slider.scrollWidth / 2; // Sesuaikan panjangnya
let isPaused = false; // Status animasi

function autoScroll() {
  if (!isPaused) { // Animasi berjalan hanya jika tidak dijeda
    if (scrollAmount >= maxScroll) {
      scrollAmount = 0; // Reset ke awal
    } else {
      scrollAmount += speed;
    }
    slider.style.transform = `translateX(-${scrollAmount}px)`;
  }
  requestAnimationFrame(autoScroll); // Loop animasi
}

// Jalankan animasi saat halaman dimuat
window.onload = () => {
  requestAnimationFrame(autoScroll);
};

// Pop-up function
function openPopup(title, description, address, contact, imgSrc) {
  document.getElementById("popup-title").innerText = title;
  document.getElementById("popup-description").innerText = "Deskripsi: " + description;
  document.getElementById("popup-address").innerText = "Alamat: " + address;
  document.getElementById("popup-positions").innerText = "Posisi: " + contact;
  document.getElementById("popup-img").src = imgSrc;
  
  document.getElementById("popup").classList.remove("hidden");
  document.body.style.overflow = "hidden";
  
  isPaused = true; // Hentikan animasi slider
}

function closePopup() {
  document.getElementById("popup").classList.add("hidden");
  document.body.style.overflow = "auto";
  
  isPaused = false; // Jalankan kembali animasi slider
}

// Mou END
      
        // Menjalankan animasi saat halaman dimuat
        // window.onload = () => {
        //   startSlider();
        // };
      
        // Beranda - Dian
        function animateCount(element, target) {
            let current = 0;
            const increment = Math.ceil(target / 100);
            const duration = 2000;
            const stepTime = duration / (target / increment);
      
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = current + '+';
                }
            }, stepTime);
        }
      
        // Intersection Observer for triggering animations when elements are visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const targetValue = {
                        'moUCount': 30,
                        'siswaCount': 280,
                        'ulasanCount': 99,
                        'pencapaianCount': 80
                    }[element.id];
                    
                    animateCount(element, targetValue);
                    observer.unobserve(element);
                }
            });
        }, {
            threshold: 0.1
        });
      
        // Observe all counter elements
        document.querySelectorAll('[id$="Count"]').forEach(counter => {
            observer.observe(counter);
        });
      
        // JavaScript untuk membuat behavior saling eksklusif
        const faqContainer = document.getElementById('faq-container');
        faqContainer.addEventListener('click', function (event) {
          if (event.target.tagName.toLowerCase() === 'summary') {
            const details = event.target.parentNode;
            const allDetails = faqContainer.querySelectorAll('details');
      
            allDetails.forEach((item) => {
              if (item !== details) {
                item.removeAttribute('open');
              }
            });
          }
        });
      </script>


        
</body>
</html>