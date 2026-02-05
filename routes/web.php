<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/visimisi', function () {
    return view('visimisi');
});

Route::get('/krs', function () {
    return view('krs');
})->name('krs');

Route::get('/wsd', function () {
    return view('wsd');
})->name('wsd');

Route::get('/terbit-ijazah', function () {
    return view('terbit_ijazah');
})->name('terbit_ijazah');

Route::get('/skpi', function () {
    return view('skpi');
})->name('skpi');

Route::get('/pinjam-ruang', function () {
    return view('pinjam_ruang');
})->name('pinjam_ruang');

Route::get('/beasiswa', function () {
    return view('beasiswa');
})->name('beasiswa');

Route::get('/minatbakat', [\App\Http\Controllers\AcademicController::class, 'minatbakat'])->name('minatbakat');

Route::get('/konseling', function () {
    $counselors = \App\Models\Counselor::all();
    return view('konseling', compact('counselors'));
})->name('konseling');

Route::get('/kegiatan', [\App\Http\Controllers\ActivityController::class, 'index'])->name('kegiatan');
Route::get('/kegiatan/{slug}', [\App\Http\Controllers\ActivityController::class, 'show'])->name('kegiatan.show');

Route::get('/portal-akademik', [\App\Http\Controllers\AcademicController::class, 'index'])->name('akademik.index');
Route::get('/portal-akademik/dokumen/{category:slug}', [\App\Http\Controllers\AcademicController::class, 'showCategoryDocuments'])->name('akademik.documents');
Route::get('/portal-akademik/kalender', [\App\Http\Controllers\AcademicController::class, 'calendar'])->name('akademik.calendar');
Route::get('/suasana-akademik', [\App\Http\Controllers\AcademicController::class, 'atmosphere'])->name('akademik.atmosphere');
Route::get('/pembelajaran', [\App\Http\Controllers\AcademicController::class, 'learning'])->name('pembelajaran');
Route::get('/curriculum', [\App\Http\Controllers\AcademicController::class, 'curriculum'])->name('pembelajaran.curriculum');
Route::post('/pembelajaran/kurikulum/auth', [\App\Http\Controllers\AcademicController::class, 'authenticateCurriculum'])->name('pembelajaran.curriculum.auth');
Route::get('/pembelajaran/mbkm', [\App\Http\Controllers\AcademicController::class, 'mbkm'])->name('pembelajaran.mbkm');
Route::get('/pembelajaran/mkwu', [\App\Http\Controllers\AcademicController::class, 'mkwu'])->name('pembelajaran.mkwu');
Route::get('/mbkm', [\App\Http\Controllers\AcademicController::class, 'mbkm'])->name('mbkm');
Route::get('/pembelajaran/dok-pembelajaran', [\App\Http\Controllers\AcademicController::class, 'learningDocuments'])->name('pembelajaran.documents');
Route::get('/kemahasiswaan', [\App\Http\Controllers\AcademicController::class, 'studentAffairs'])->name('kemahasiswaan');
Route::get('/kemahasiswaan/prestasi', [\App\Http\Controllers\AcademicController::class, 'achievements'])->name('prestasi-mahasiswa');
Route::get('/mhsasing', [\App\Http\Controllers\MahasiswaAsingController::class, 'index'])->name('mhsasing');
Route::get('/information', [\App\Http\Controllers\InformationController::class, 'index'])->name('information.index');
Route::get('/information/{post:slug}', [\App\Http\Controllers\InformationController::class, 'show'])->name('information.show');
Route::get('/kemahasiswaan/dokumen', [\App\Http\Controllers\AcademicController::class, 'studentDocuments'])->name('kemahasiswaan.documents');
Route::get('/dok-eks', [\App\Http\Controllers\AcademicController::class, 'externalDocuments'])->name('external.documents');

Route::get('/rapat', [\App\Http\Controllers\MeetingController::class, 'index'])->name('rapat.index');
Route::post('/rapat/auth', [\App\Http\Controllers\MeetingController::class, 'authenticate'])->name('rapat.auth');
Route::get('/rapat/{agenda:slug}', [\App\Http\Controllers\MeetingController::class, 'show'])->name('rapat.show');
// Rekap Dokumen Program Studi
Route::get('/rekap-dok-prodi', [\App\Http\Controllers\StudyProgramDocumentController::class, 'index'])->name('rekap-prodi.index');
Route::post('/rekap-dok-prodi/auth', [\App\Http\Controllers\StudyProgramDocumentController::class, 'authenticate'])->name('rekap-prodi.authenticate');
Route::get('/arsip-baak', [\App\Http\Controllers\ArchiveController::class, 'index'])->name('arsip.index');
Route::post('/arsip-baak/auth', [\App\Http\Controllers\ArchiveController::class, 'authenticate'])->name('arsip.auth');

// Pusat Q & A
Route::get('/tanya-jawab', [\App\Http\Controllers\QuestionAnswerController::class, 'index'])->name('qa.index');
Route::post('/tanya-jawab', [\App\Http\Controllers\QuestionAnswerController::class, 'store'])->name('qa.store');

// Page Password Auth
Route::post('/page-password/auth', [\App\Http\Controllers\PagePasswordController::class, 'authenticate'])->name('page.password.auth');

// Language Switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session()->put('locale', $locale);
        session()->save();
    }
    return redirect()->back();
})->name('lang.switch');

// Dynamic Pages (Must be last)
Route::get('/{slug}', [\App\Http\Controllers\PageController::class, 'show'])->name('page.show');
