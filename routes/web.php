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
    Route::get('main/create', App\Livewire\Admin\MicrolearningCreate::class)->name('micl.create');
    Route::get('main/{mcid}/detail', App\Livewire\MicrolearningDetail::class)->name('micl.detail');
    Route::get('main/{mcid}/pembelajaran/create', App\Livewire\Admin\PembelajaranCreate::class)->name('micl.create-pembelajaran');
    Route::get('pembelajaran/{pbid}/list', App\Livewire\PembelajaranDetail::class)->name('pmbj.detail');
    Route::get('pembelajaran/{pbid}/detail', App\Livewire\Admin\PembelajaranEdit::class)->name('pmbj.edit');
    Route::get('pembelajaran/{pbid}/materi/create', App\Livewire\Admin\MateriCreate::class)->name('pmbj.create-materi');
    Route::get('pembelajaran/{mid}/materi/detail', App\Livewire\Admin\MateriDetail::class)->name('pmbj.detail-materi');
});


require __DIR__.'/auth.php';

Route::get('/tes', function(){
    return App\Models\Kelas::with('pembelajaran.materi.progres')
            ->where('user_id', 1)
            ->get()
            ;
});
