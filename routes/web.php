<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;

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

Route::get('payment', [PaypalController::class, 'payment'])->name('payment');
Route::get('success', [PaypalController::class, 'success'])->name('payment.success');
Route::get('cancel', [PaypalController::class, 'cancel'])->name('payment.cancel');