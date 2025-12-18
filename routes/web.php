<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\CountTransactionscontroller;
use App\Http\Controllers\DailyTransactionscontroller;
use App\Http\Controllers\Penggunacontroller;
use App\Http\Controllers\Pointcontroller;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\Rewardscontroller;
use App\Http\Controllers\Rewardtransactioncontroller;
use App\Http\Controllers\Scanhistorycontroller;
use App\Http\Controllers\Sesicontroller;
use App\Http\Middleware\UserAkses;
use App\Models\dailyTransactions;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

route::get('/home',function(){
    return redirect('/admin');
});

//sistem
route::middleware(['guest'])->group(function(){
    //sesi controller
    route::get('/',[Sesicontroller::class,'index'])->name('login');
    route::post('/',[Sesicontroller::class,'login']);
});


//admin
route::middleware(['auth'])->group(function(){
    route::get('/admin',[Admincontroller::class, 'index'])->middleware('userAkses:admin');
    route::get('/logout', [Sesicontroller::class, 'logout']);
});

//pengguna
route::middleware(['auth'])->group(function(){
    route::get('/pengguna',[Penggunacontroller::class, 'index'])->middleware('userAkses:pengguna')->name('pengguna.index');
    route::get('/logout',[Sesicontroller::class, 'logout']);
    route::get('/transaksiHarian',[DailyTransactionscontroller::class, 'index'])->name('transaksiHarian.index');
    route::get('/profil', [QrCodeController::class, 'index'])->name('profil.index');
});

//qr code generate
route::get('/qrcode', [QrCodeController::class, 'show']);

//reward transaction
route::get('/rewardtransaction', [Rewardtransactioncontroller::class, 'index'])->name('rewardtransaction.index');

//rewards
route::get('/rewards', [Rewardscontroller::class, 'index'])->name('rewards.index');

//point
route::get('/point', [Pointcontroller::class, 'index'])->name('point.index');

//daily transactions
route::get('/dailytransactions', [DailyTransactionscontroller::class, 'index'])->name('dailyTrans.index');

//count transactions
route::get('/countTransactions', [CountTransactionscontroller::class, 'index'])->name('countTransaction.index');