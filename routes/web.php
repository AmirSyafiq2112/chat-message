<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// LIVEWIRE
Route::get('/users',CreateChat::class)->name('users');
Route::get('/chat{key?}',Main::class)->name('chat');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
