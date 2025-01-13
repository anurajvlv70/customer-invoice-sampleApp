<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Dashboard Route
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management Routes (Authenticated Users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Portal Routes (Authenticated Users)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Customers Section
    Route::get('/data/{type}', [CustomerController::class, 'index'])->name('customers');

    // Invoices Section

});

Route::get('/add',[customerController::class,'add'])->name('add');
Route::post('/cus_submit', [customerController::class, 'cus_store'])->name('cus_submit');
Route::get('/list',[customerController::class,'allRecord'])->name('list');

// Include Authentication Routes
require __DIR__.'/auth.php';

