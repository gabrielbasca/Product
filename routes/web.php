<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduseController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('produse', ProduseController::class);

Route::resource('orders', OrderController::class)->only(['index', 'create', 'store']);

Route::get('/orders/pdf/{id}', [OrderController::class, 'generatePdf'])->name('orders.pdf');
