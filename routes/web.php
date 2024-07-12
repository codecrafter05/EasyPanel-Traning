<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FormController;

Route::get('/', [PageController::class, 'showHeader']);
//Route::post('/submit-contact-form', [PageController::class, 'submitContactForm'])->name('contact.submit');
Route::post('/submit-form', [FormController::class, 'store'])->name('form.submit');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
