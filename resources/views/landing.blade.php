<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekapitulasi Data Pelayanan - Kabupaten Ogan Ilir</title>
    <meta name="description" content="Sistem Rekapitulasi Data Pelayanan Kabupaten Ogan Ilir - Platform transparansi dan akuntabilitas pelayanan publik">
    <meta name="keywords" content="rekapitulasi data, pelayanan publik, ogan ilir, transparansi, akuntabilitas">
    <meta name="author" content="Pemerintah Kabupaten Ogan Ilir">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Sistem Rekapitulasi Data Pelayanan - Kabupaten Ogan Ilir">
    <meta property="og:description" content="Platform transparansi dan akuntabilitas pelayanan publik Kabupaten Ogan Ilir">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="Sistem Rekapitulasi Data Pelayanan - Kabupaten Ogan Ilir">
    <meta property="twitter:description" content="Platform transparansi dan akuntabilitas pelayanan publik Kabupaten Ogan Ilir">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-brand-gray text-text-primary">

    <!-- Header / Navbar -->
    <header id="main-header"
        class="bg-transparent text-white fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="/images/logo.svg" alt="Logo Ogan Ilir" class="h-10 md:h-12 mr-3">
                <a href="/" class="text-xl md:text-2xl font-bold current-text-color">
                    Pelayanan Ogan Ilir
                </a>
            </div>
            <nav class="hidden md:flex space-x-1 items-center">
                <a href="#beranda" class="current-text-color hover:opacity-75 p-3 group">
                    Beranda
                    <div class="bg-white h-[2px] w-0 group-hover:w-full transition-all duration-300 nav-underline">
                    </div>
                </a>
                <a href="#tentang" class="current-text-color hover:opacity-75 p-3 group">
                    Tentang
                    <div class="bg-white h-[2px] w-0 group-hover:w-full transition-all duration-300 nav-underline">
                    </div>
                </a>
                <a href="#manfaat" class="current-text-color hover:opacity-75 p-3 group">
                    Manfaat
                    <div class="bg-white h-[2px] w-0 group-hover:w-full transition-all duration-300 nav-underline">
                    </div>
                </a>
                <a href="#statistik" class="current-text-color hover:opacity-75 p-3 group">
                    Statistik
                    <div class="bg-white h-[2px] w-0 group-hover:w-full transition-all duration-300 nav-underline">
                    </div>
                </a>
                <a href="#kontak" class="current-text-color hover:opacity-75 p-3 group">
                    Kontak
                    <div class="bg-white h-[2px] w-0 group-hover:w-full transition-all duration-300 nav-underline">
                    </div>
                </a>
                <a href="/admin"
                    class="bg-white text-brand-blue px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300 ml-2 nav-button-solid">
                    Masuk
                </a>
            </nav>
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="current-text-color focus:outline-none">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg"> {/* Mobile menu bg will be white always for
            now */}
            <a href="#beranda"
                class="block text-text-secondary hover:text-brand-blue hover:underline px-6 py-3">Beranda</a>
            <a href="#tentang"
                class="block text-text-secondary hover:text-brand-blue hover:underline px-6 py-3">Tentang</a>
            <a href="#manfaat"
                class="block text-text-secondary hover:text-brand-blue hover:underline px-6 py-3">Manfaat</a>
            <a href="#statistik"
                class="block text-text-secondary hover:text-brand-blue hover:underline px-6 py-3">Statistik</a>
            <a href="#kontak"
                class="block text-text-secondary hover:text-brand-blue hover:underline px-6 py-3">Kontak</a>
            <a href="/admin"
                class="block bg-brand-blue text-white text-center mx-6 my-3 px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                Masuk
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="relative overflow-hidden min-h-screen flex items-center justify-center pt-20 md:pt-24">
        <!-- {/* Adjusted padding top due to fixed navbar */} -->
        <!-- Background Image Container -->
        <div id="hero-bg-image" class="absolute inset-0 z-0"></div>
        <!-- Overlay for better text contrast -->
        <div class="absolute inset-0 bg-black opacity-30 z-10"></div>
        </div>

        <!-- Hero Content -->
        <div class="container mx-auto px-6 text-center relative z-20">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 shadow-text-lg">
                Transparansi Data Pelayanan Kabupaten Ogan Ilir
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto shadow-text-md">
                Akses informasi rekapitulasi dan statistik kinerja pelayanan publik di Kabupaten Ogan Ilir secara mudah
                dan transparan.
            </p>
            <div class="space-x-0 md:space-x-4 space-y-4 md:space-y-0">
                <a href="#statistik"
                    class="bg-brand-blue text-white px-8 py-3 rounded-md text-lg font-medium hover:bg-blue-700 transition duration-300 inline-block shadow-lg">
                    Lihat Statistik
                </a>
                <a href="/admin"
                    class="bg-white text-brand-blue px-8 py-3 rounded-md text-lg font-medium hover:bg-gray-100 transition duration-300 inline-block shadow-lg">
                    Masuk ke Sistem
                </a>
            </div>
            <!-- The user's image div is removed as the background is now part of the section -->
        </div>
    </section>

    <!-- Sections below will be added in next steps -->
    <section id="tentang" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-4 scroll-animate">Tentang Sistem Rekapitulasi Kami</h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto scroll-animate delay-100">
                    Sistem Rekapitulasi Data Pelayanan Kabupaten Ogan Ilir hadir sebagai wujud komitmen kami terhadap
                    transparansi dan akuntabilitas publik. Melalui platform ini, masyarakat dapat mengakses informasi
                    terkini mengenai berbagai jenis layanan yang telah diproses dan diselesaikan, serta memantau
                    statistik kinerja pelayanan secara keseluruhan.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 text-center">                <div class="p-6 scroll-animate">
                    <div class="text-brand-blue text-5xl mb-4"><i class="fas fa-chart-line"></i></div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Data Akurat & Terpadu</h3>
                    <p class="text-text-secondary">Menyajikan data rekapitulasi yang bersumber langsung dari sistem
                        pelayanan terpadu, memastikan keakuratan dan keandalan informasi.</p>
                </div>                <div class="p-6 scroll-animate delay-100">
                    <div class="text-brand-blue text-5xl mb-4"><i class="fas fa-clock"></i></div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Informasi Real-time</h3>
                    <p class="text-text-secondary">Statistik dan laporan kinerja diperbarui secara berkala, memberikan
                        gambaran terkini tentang progres pelayanan publik di daerah kita.</p>
                </div>                <div class="p-6 scroll-animate delay-200">
                    <div class="text-brand-blue text-5xl mb-4"><i class="fas fa-folder-open"></i></div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Akses Publik Terbuka</h3>
                    <p class="text-text-secondary">Masyarakat dapat dengan mudah mengakses informasiini sebagai bagian
                        dari hak untuk mengetahui dan mengawasi kinerja pemerintah.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="cara-kerja" class="py-16 md:py-24 bg-brand-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-4 scroll-animate">Cara Kerja Sistem</h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto scroll-animate delay-100">
                    Proses sederhana untuk mengakses dan memanfaatkan sistem rekapitulasi data pelayanan kami
                </p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center scroll-animate">
                    <div class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <div class="text-brand-blue text-3xl"><i class="fas fa-user-plus"></i></div>
                    </div>
                    <div class="bg-brand-blue text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto mb-3 text-sm font-bold">1</div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Daftar/Masuk</h3>
                    <p class="text-text-secondary">Masuk ke sistem menggunakan akun yang telah disediakan oleh administrator</p>
                </div>
                <div class="text-center scroll-animate delay-100">
                    <div class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <div class="text-brand-blue text-3xl"><i class="fas fa-search"></i></div>
                    </div>
                    <div class="bg-brand-blue text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto mb-3 text-sm font-bold">2</div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Jelajahi Data</h3>
                    <p class="text-text-secondary">Akses berbagai jenis data pelayanan dan statistik kinerja yang tersedia</p>
                </div>
                <div class="text-center scroll-animate delay-200">
                    <div class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <div class="text-brand-blue text-3xl"><i class="fas fa-chart-bar"></i></div>
                    </div>
                    <div class="bg-brand-blue text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto mb-3 text-sm font-bold">3</div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Analisis</h3>
                    <p class="text-text-secondary">Gunakan fitur dashboard dan visualisasi untuk memahami trends dan pola data</p>
                </div>
                <div class="text-center scroll-animate delay-300">
                    <div class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <div class="text-brand-blue text-3xl"><i class="fas fa-download"></i></div>
                    </div>
                    <div class="bg-brand-blue text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto mb-3 text-sm font-bold">4</div>
                    <h3 class="text-xl font-semibold text-text-primary mb-2">Export Data</h3>
                    <p class="text-text-secondary">Unduh laporan dan data dalam berbagai format sesuai kebutuhan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="manfaat" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-4 scroll-animate">Manfaat Sistem</h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto scroll-animate delay-100">
                    Keuntungan yang dapat diperoleh dengan menggunakan sistem rekapitulasi data pelayanan kami
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="flex items-start scroll-animate">
                        <div class="bg-brand-blue text-white rounded-lg p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-rocket text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-text-primary mb-2">Efisiensi Pelaporan</h3>
                            <p class="text-text-secondary">Otomatisasi proses rekapitulasi mengurangi waktu dan tenaga yang diperlukan untuk membuat laporan</p>
                        </div>
                    </div>
                    <div class="flex items-start scroll-animate delay-100">
                        <div class="bg-brand-blue text-white rounded-lg p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-bullseye text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-text-primary mb-2">Akurasi Data</h3>
                            <p class="text-text-secondary">Integrasi langsung dengan sistem sumber menjamin keakuratan dan konsistensi data</p>
                        </div>
                    </div>
                    <div class="flex items-start scroll-animate delay-200">
                        <div class="bg-brand-blue text-white rounded-lg p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-mobile-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-text-primary mb-2">Kemudahan Akses</h3>
                            <p class="text-text-secondary">Interface yang user-friendly dapat diakses kapan saja dan dimana saja</p>
                        </div>
                    </div>
                    <div class="flex items-start scroll-animate delay-300">
                        <div class="bg-brand-blue text-white rounded-lg p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-eye text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-text-primary mb-2">Transparansi Pelayanan</h3>
                            <p class="text-text-secondary">Masyarakat dapat memantau kinerja pelayanan publik secara real-time</p>
                        </div>
                    </div>
                </div>
                <div class="scroll-animate delay-100">
                    <div class="bg-brand-gray rounded-lg p-8 text-center">
                        <div class="text-brand-blue text-6xl mb-6"><i class="fas fa-chart-line"></i></div>
                        <h3 class="text-2xl font-bold text-text-primary mb-4">Real-time Insights</h3>
                        <p class="text-text-secondary mb-6">Dapatkan wawasan mendalam tentang kinerja pelayanan dengan visualisasi data yang interaktif dan mudah dipahami</p>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="bg-white rounded p-3">
                                <div class="text-brand-blue font-bold text-lg">24/7</div>
                                <div class="text-text-secondary">Akses Data</div>
                            </div>
                            <div class="bg-white rounded p-3">
                                <div class="text-brand-blue font-bold text-lg">100%</div>
                                <div class="text-text-secondary">Akurat</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="statistik" class="py-16 md:py-24 bg-brand-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-4">Statistik Kinerja Pelayanan</h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto">
                    Berikut adalah ringkasan data dan statistik utama dari berbagai layanan yang telah direkapitulasi
                    oleh Pemerintah Kabupaten Ogan Ilir hingga saat ini.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Contoh Kartu Statistik 1 -->                <div
                    class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300 scroll-animate">
                    <div class="text-brand-blue text-5xl mb-4"><i class="fas fa-clipboard-list"></i></div>
                    <h3 id="statTotalLayanan" class="text-4xl font-bold text-text-primary mb-2" data-target="12345">0
                    </h3>
                    <p class="text-text-secondary text-lg">Total Layanan Direkapitulasi</p>
                </div>
                <!-- Contoh Kartu Statistik 2 -->
                <div
                    class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="text-brand-blue text-5xl mb-4"><i class="fas fa-check-double"></i></div>
                    <h3 id="statLayananSelesai" class="text-4xl font-bold text-text-primary mb-2" data-target="10987">0
                    </h3>
                    <p class="text-text-secondary text-lg">Layanan Selesai Tahun Ini</p>
                </div>
                <!-- Contoh Kartu Statistik 3 -->
                <div
                    class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="text-brand-blue text-5xl mb-4"><i class="fas fa-smile"></i></div> {/* Changed icon for
                    satisfaction */}
                    <h3 id="statKepuasan" class="text-4xl font-bold text-text-primary mb-2" data-target="92">0%</h3>
                    <p class="text-text-secondary text-lg">Tingkat Kepuasan Pengguna</p>
                </div>
                <!-- Anda bisa menambahkan lebih banyak kartu statistik di sini -->
            </div>
        </div>
    </section>

    <section id="kontak" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-4">Hubungi Kami</h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto">
                    Kami selalu terbuka untuk masukan dan pertanyaan. Silakan hubungi kami melalui detail kontak di
                    bawah ini atau kunjungi kantor kami.
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="bg-brand-gray p-4 md:p-6 rounded-lg shadow-lg">
                    <div class="flex flex-col md:flex-row gap-6 md:gap-8">

                        <div class="md:w-1/2">
                            <h3 class="text-2xl font-semibold text-text-primary mb-4 md:mb-6">Informasi Kantor</h3>
                            <div class="space-y-3 text-text-secondary">
                                <p class="flex items-start">
                                    <i
                                        class="fas fa-map-marker-alt mr-3 text-brand-blue w-5 text-center shrink-0 mt-1"></i>
                                    <span>Jl. Lintas Sumatra KM.35, Indralaya Utara, Kabupaten Ogan Ilir, Sumatera
                                        Selatan</span>
                                </p>
                                <p class="flex items-center">
                                    <i class="fas fa-phone-alt mr-3 text-brand-blue w-5 text-center shrink-0"></i>
                                    <span>(0711) 580-000 (Contoh)</span>
                                </p>
                                <p class="flex items-center">
                                    <i class="fas fa-envelope mr-3 text-brand-blue w-5 text-center shrink-0"></i>
                                    <span>diskominfo@oganilirkab.go.id (Contoh)</span>
                                </p>
                                <p class="flex items-center">
                                    <i class="fas fa-globe mr-3 text-brand-blue w-5 text-center shrink-0"></i>
                                    <span>www.oganilirkab.go.id</span>
                                </p>
                            </div>
                        </div>

                        <div class="md:w-1/2 w-full h-[300px] md:h-auto md:min-h-[350px] rounded-lg overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.4519992273854!2d104.6633581!3d-3.2371520999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b95f96e14a07b%3A0xe0f425a26b9fabd6!2sDisdukcapil%20Ogan%20Ilir!5e0!3m2!1sid!2sid!4v1747038938575!5m2!1sid!2sid"
                                class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <footer class="bg-sidebar-bg text-sidebar-text py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h4 class="text-lg font-semibold mb-3">Pemerintah Kabupaten Ogan Ilir</h4>
                    <p class="text-sm text-gray-400">Berkomitmen untuk menyediakan informasi dan pelayanan publik yang
                        transparan, akuntabel, dan mudah diakses oleh seluruh masyarakat.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-3">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#beranda" class="hover:text-white hover:underline">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-white hover:underline">Tentang Sistem</a></li>
                        <li><a href="#manfaat" class="hover:text-white hover:underline">Manfaat</a></li>
                        <li><a href="#statistik" class="hover:text-white hover:underline">Statistik</a></li> {/* Changed
                        from #layanan */}
                        <li><a href="/admin" class="hover:text-white hover:underline">Masuk Sistem</a></li>
                        <li><a href="[Placeholder: Kebijakan Privasi]"
                                class="hover:text-white hover:underline">Kebijakan Privasi</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-3">Media Sosial</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-sm text-gray-400">
                <p>&copy;
                    <script>document.write(new Date().getFullYear())</script> Pemerintah Kabupaten Ogan Ilir. All rights
                    reserved.
                </p>
                <p class="mt-1">Dikembangkan untuk pelayanan publik yang lebih baik.</p>
            </div>
        </div>
    </footer>
</body>
</html>