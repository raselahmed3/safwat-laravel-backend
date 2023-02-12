<?php

use App\Http\Controllers\DashbordController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashbordController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('lead' , LeadController::class);
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice-index');
    Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoice-show');
    Route::get('/product-purchase', [InvoiceController::class, 'purchase'])->name('product-purchase');
    Route::resource('product' , ProductController::class);
    Route::get('/whatsapp', [WhatsAppController::class, 'index'])->name('whatsapp');
});

require __DIR__.'/auth.php';
