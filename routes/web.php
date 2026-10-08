<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DashboardController;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Guru;

Route::get('/', [HomeController::class, 'index'])->name('landing.index');
Route::view('/profil', 'landing.profil')->name('landing.profil');
Route::view('/visi-misi', 'landing.visi-misi')->name('landing.visi-misi');
Route::view('/kontak', 'landing.kontak')->name('landing.kontak');

Route::get('/guru-staf', function () {
    return view('landing.guru.guru-staf', ['gurus' => Guru::all()]);
})->name('landing.guru-staf');

Route::get('/ekstrakulikuler-sekolah', function () {
    return view('landing.ekstrakulikuler.ekstrakulikuler-sekolah', ['ekstrakulikuler' => Ekstrakulikuler::all()]);
})->name('landing.ekskul');

Route::get('/berita-sekolah', function () {
    return view('landing.berita.berita', ['berita' => Berita::where('status', 'publis')->latest()->get()]);
})->name('landing.berita');

Route::get('/guru/{id}', [HomeController::class, 'showGuru'])->name('landing.guru.show');
Route::get('/ekstrakulikuler/{id}', [HomeController::class, 'showEkskul'])->name('landing.ekskul.show');
Route::get('/detail-berita/{id}', [HomeController::class, 'showBerita'])->name('landing.berita.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profil.index');
    Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-sekolah/update', [ProfilSekolahController::class, 'update'])->name('profil.update');
    
    Route::resource('siswa', SiswaController::class);
    Route::resource('user', UserController::class)->middleware('checkauth');
    Route::resource('guru', GuruController::class);
    Route::resource('ekstrakulikuler', EkstrakulikulerController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('galeri', GaleriController::class);
});