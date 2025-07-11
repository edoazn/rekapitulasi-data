@extends('layouts.app')

@section('title', 'Sistem Rekapitulasi Data Pelayanan - Dashboard Analytics & Reporting')

@section('content')
<!-- Header Section -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-primary">Rekapitulasi Data Pelayanan</h1>
                    <p class="text-xs text-gray-600">Sistem Informasi Terpadu</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-gray-600 hover:text-primary transition-colors">Fitur</a>
                <a href="#statistics" class="text-gray-600 hover:text-primary transition-colors">Statistik</a>
                <a href="#how-it-works" class="text-gray-600 hover:text-primary transition-colors">Cara Kerja</a>
                <a href="#benefits" class="text-gray-600 hover:text-primary transition-colors">Manfaat</a>
            </div>

            <!-- CTA Button -->
            <div class="flex items-center space-x-4">
                <a href="/admin" class="bg-primary hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    Masuk Sistem
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden p-2" id="mobile-menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="py-4 space-y-2">
                <a href="#features" class="block px-4 py-2 text-text-secondary hover:text-brand-blue">Fitur</a>
                <a href="#statistics" class="block px-4 py-2 text-text-secondary hover:text-brand-blue">Statistik</a>
                <a href="#how-it-works" class="block px-4 py-2 text-text-secondary hover:text-brand-blue">Cara Kerja</a>
                <a href="#benefits" class="block px-4 py-2 text-text-secondary hover:text-brand-blue">Manfaat</a>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="pt-24 pb-16 bg-gradient-to-br from-brand-blue-light to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-6xl font-bold text-text-primary leading-tight">
                        Sistem Rekapitulasi Data 
                        <span class="text-brand-blue">Pelayanan Terpadu</span>
                    </h1>
                    <p class="text-xl text-text-secondary leading-relaxed">
                        Kelola, analisis, dan laporkan data pelayanan dengan mudah melalui sistem yang terintegrasi, 
                        efisien, dan memberikan insight real-time untuk pengambilan keputusan yang lebih baik.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/admin" class="bg-brand-blue hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all transform hover:scale-105 text-center">
                        Mulai Sekarang
                    </a>
                    <a href="#features" class="border-2 border-brand-blue text-brand-blue hover:bg-brand-blue hover:text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all text-center">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <div class="flex items-center space-x-8">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-brand-blue">{{ number_format($statistics['total_data']) }}+</div>
                        <div class="text-sm text-text-secondary">Data Terproses</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-brand-blue">{{ $statistics['total_services'] }}+</div>
                        <div class="text-sm text-text-secondary">Jenis Layanan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-brand-blue">{{ $statistics['active_users'] }}+</div>
                        <div class="text-sm text-text-secondary">Pengguna Aktif</div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative z-10 bg-white rounded-2xl shadow-2xl p-8">
                    <div class="space-y-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                        
                        <!-- Mock Dashboard -->
                        <div class="space-y-4">
                            <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-brand-blue-light p-4 rounded-lg">
                                    <div class="h-3 bg-brand-blue rounded w-1/2 mb-2"></div>
                                    <div class="h-6 bg-brand-blue rounded w-3/4"></div>
                                </div>
                                <div class="bg-green-100 p-4 rounded-lg">
                                    <div class="h-3 bg-green-500 rounded w-1/2 mb-2"></div>
                                    <div class="h-6 bg-green-500 rounded w-3/4"></div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-3 bg-gray-200 rounded"></div>
                                <div class="h-3 bg-gray-200 rounded w-5/6"></div>
                                <div class="h-3 bg-gray-200 rounded w-4/6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Background decoration -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-brand-blue/20 rounded-full"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-gradient-to-br from-brand-blue/10 to-transparent rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-text-primary mb-4">
                Fitur Unggulan Sistem
            </h2>
            <p class="text-xl text-text-secondary max-w-3xl mx-auto">
                Dilengkapi dengan berbagai fitur canggih untuk mendukung pengelolaan data pelayanan yang efektif dan efisien
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Dashboard Analytics -->
            <div class="feature-card bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow group">
                <div class="w-14 h-14 bg-gradient-to-br from-brand-blue to-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Dashboard Analytics</h3>
                <p class="text-text-secondary leading-relaxed">Visualisasi data real-time dengan grafik dan chart interaktif untuk analisis mendalam</p>
            </div>

            <!-- Data Management -->
            <div class="feature-card bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow group">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Manajemen Data</h3>
                <p class="text-text-secondary leading-relaxed">Kelola data pelayanan dengan mudah melalui interface yang intuitif dan user-friendly</p>
            </div>

            <!-- Export Data -->
            <div class="feature-card bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow group">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Export Multi-Format</h3>
                <p class="text-text-secondary leading-relaxed">Export data dalam berbagai format seperti Excel, PDF, dan CSV sesuai kebutuhan</p>
            </div>

            <!-- Real-time Monitoring -->
            <div class="feature-card bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow group">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Real-time Monitoring</h3>
                <p class="text-text-secondary leading-relaxed">Pantau aktivitas dan performa pelayanan secara real-time untuk respon yang cepat</p>
            </div>

            <!-- User Management -->
            <div class="feature-card bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow group">
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">User Management</h3>
                <p class="text-text-secondary leading-relaxed">Sistem role-based access yang aman dengan pengaturan hak akses yang fleksibel</p>
            </div>

            <!-- Security -->
            <div class="feature-card bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow group">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Keamanan Data</h3>
                <p class="text-text-secondary leading-relaxed">Perlindungan data tingkat tinggi dengan enkripsi dan backup otomatis</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section id="statistics" class="py-20 bg-gradient-to-r from-brand-blue to-blue-700">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                Pencapaian Sistem
            </h2>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Statistik dan pencapaian yang menunjukkan efektivitas sistem dalam mendukung pelayanan
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="{{ $statistics['total_data'] }}">0</div>
                <div class="text-blue-100">Data Terproses</div>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="{{ $statistics['total_services'] }}">0</div>
                <div class="text-blue-100">Jenis Layanan</div>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 12a4 4 0 110-8 4 4 0 010 8zm0 0V9a4 4 0 118 0v4"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="{{ $statistics['reporting_period'] }}">0</div>
                <div class="text-blue-100">Bulan Periode</div>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="{{ $statistics['active_users'] }}">0</div>
                <div class="text-blue-100">Pengguna Aktif</div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-20 bg-brand-gray">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-text-primary mb-4">
                Cara Kerja Sistem
            </h2>
            <p class="text-xl text-text-secondary max-w-3xl mx-auto">
                Proses sederhana dan terstruktur untuk mengelola data pelayanan secara efektif
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="text-center group">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-brand-blue rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <div class="hidden md:block absolute top-12 left-24 w-32 h-0.5 bg-brand-blue/30"></div>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Input Data</h3>
                <p class="text-text-secondary leading-relaxed">
                    Masukkan data pelayanan melalui form yang telah disediakan dengan validasi otomatis
                </p>
            </div>

            <!-- Step 2 -->
            <div class="text-center group">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-brand-blue rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <div class="hidden md:block absolute top-12 left-24 w-32 h-0.5 bg-brand-blue/30"></div>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Proses & Analisis</h3>
                <p class="text-text-secondary leading-relaxed">
                    Sistem secara otomatis memproses dan menganalisis data untuk menghasilkan insight
                </p>
            </div>

            <!-- Step 3 -->
            <div class="text-center group">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-brand-blue rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-text-primary mb-3">Laporan & Export</h3>
                <p class="text-text-secondary leading-relaxed">
                    Generate laporan komprehensif dan export dalam format yang diinginkan
                </p>
            </div>
        </div>

        <!-- Additional Steps -->
        <div class="mt-16 bg-white rounded-xl p-8 shadow-lg">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-text-primary mb-4">Proses Terintegrasi</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Validasi data secara real-time</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Backup otomatis setiap perubahan</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Notifikasi untuk update penting</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Audit trail untuk transparansi</span>
                        </li>
                    </ul>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-brand-blue-light to-blue-50 rounded-lg p-8">
                        <svg class="w-32 h-32 mx-auto text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section id="benefits" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-text-primary mb-4">
                Manfaat Sistem
            </h2>
            <p class="text-xl text-text-secondary max-w-3xl mx-auto">
                Rasakan keuntungan menggunakan sistem rekapitulasi data pelayanan yang modern dan terintegrasi
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-text-primary mb-2">Efisiensi Pelaporan</h3>
                        <p class="text-text-secondary">Hemat waktu hingga 80% dalam proses pembuatan laporan dengan otomatisasi yang cerdas</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-text-primary mb-2">Akurasi Data</h3>
                        <p class="text-text-secondary">Tingkatkan akurasi data hingga 99% dengan validasi otomatis dan kontrol kualitas</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-text-primary mb-2">Kemudahan Akses</h3>
                        <p class="text-text-secondary">Akses kapan saja, dimana saja melalui berbagai device dengan interface yang responsif</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-text-primary mb-2">Transparansi Pelayanan</h3>
                        <p class="text-text-secondary">Meningkatkan transparansi dan akuntabilitas dengan tracking yang detail</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-text-primary mb-2">Real-time Insights</h3>
                        <p class="text-text-secondary">Dapatkan insight real-time untuk pengambilan keputusan yang lebih baik dan cepat</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="bg-gradient-to-br from-brand-blue-light to-blue-50 rounded-2xl p-8">
                    <div class="text-center space-y-6">
                        <div class="w-24 h-24 bg-brand-blue rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-text-primary">Siap Memulai?</h3>
                        <p class="text-text-secondary">Bergabunglah dengan ratusan pengguna yang telah merasakan manfaatnya</p>
                        <a href="/admin" class="inline-flex items-center bg-brand-blue hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Mulai Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Floating elements -->
                <div class="absolute -top-4 -right-4 w-20 h-20 bg-brand-blue/10 rounded-full"></div>
                <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-to-br from-brand-blue/20 to-transparent rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-brand-blue to-brand-blue-light rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Rekapitulasi Data</h3>
                        <p class="text-sm text-gray-400">Pelayanan Terpadu</p>
                    </div>
                </div>
                <p class="text-gray-400 leading-relaxed">
                    Sistem informasi terpadu untuk mengelola dan menganalisis data pelayanan dengan mudah dan efisien.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                    <li><a href="#statistics" class="text-gray-400 hover:text-white transition-colors">Statistik</a></li>
                    <li><a href="#how-it-works" class="text-gray-400 hover:text-white transition-colors">Cara Kerja</a></li>
                    <li><a href="#benefits" class="text-gray-400 hover:text-white transition-colors">Manfaat</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                <ul class="space-y-2">
                    <li><span class="text-gray-400">Dashboard Analytics</span></li>
                    <li><span class="text-gray-400">Data Management</span></li>
                    <li><span class="text-gray-400">Report Generation</span></li>
                    <li><span class="text-gray-400">User Management</span></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-400">admin@rekapitulasi.go.id</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-gray-400">(021) 1234-5678</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-gray-400">Jakarta, Indonesia</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Sistem Rekapitulasi Data Pelayanan. Semua hak dilindungi.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Kebijakan Privasi</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
