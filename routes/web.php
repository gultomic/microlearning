<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LearningController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('studi/{mcid}', 'studi')
    ->name('studi.index');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('lesson/{pbid}/material/{material}', 'lesson')
    ->middleware(['auth'])
    ->name('lesson.index');

Route::post('lesson-progress', [LearningController::class, 'progress'])
    ->middleware(['auth']);

Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin-dashboard')->name('dashboard');
    // Route::view('main/{mcid}/detail', 'pembelajaran')->name('micl.detail');
    Route::get('main/{mcid}/detail', App\Livewire\MicrolearningDetail::class)->name('micl.detail');
    Route::get('pembelajaran/{pbid}/detail', App\Livewire\PembelajaranDetail::class)->name('pmbj.detail');
});


require __DIR__.'/auth.php';

Route::get('/tes', function(){
    return App\Models\Pembelajaran::withCount('kelas')->get();
});
