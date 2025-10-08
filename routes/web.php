<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard',[StudentController::class, 'index'])->name('dashboard');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__.'/auth.php';
