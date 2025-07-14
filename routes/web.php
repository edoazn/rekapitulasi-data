<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Sitemap for SEO
Route::get('/sitemap.xml', function () {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $xml .= '<url>';
    $xml .= '<loc>' . url('/') . '</loc>';
    $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
    $xml .= '<changefreq>weekly</changefreq>';
    $xml .= '<priority>1.0</priority>';
    $xml .= '</url>';
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// Redirect ke Filament admin jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('dashboard');
});
