<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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
    return view('index');
});

// Route::get('/test', function () {
//     return view('index');
// });

Route::post('/payment/notification', [PaymentController::class, 'handleNotification'])->name('payment.notification');
Route::get('/payment/{transaction}', [PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/payment/print/{transaction}', [PaymentController::class, 'print'])->name('payment.print');