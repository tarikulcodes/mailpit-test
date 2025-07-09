<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [MailController::class, 'index'])->name('home');
Route::get('/send-mail', [MailController::class, 'sentMail'])->name('send-mail');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
