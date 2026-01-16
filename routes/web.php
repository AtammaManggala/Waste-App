<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\AdminRewardcontroller;
use App\Http\Controllers\Api\Servocontroller;
use App\Http\Controllers\CountTransactionscontroller;
use App\Http\Controllers\DailyTransactionscontroller;
use App\Http\Controllers\Penggunacontroller;
use App\Http\Controllers\Pointcontroller;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\Registercontroller;
use App\Http\Controllers\rekapTransactionscontroller;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\Rewardscontroller;
use App\Http\Controllers\Rewardtransactioncontroller;
use App\Http\Controllers\Scanhistorycontroller;
use App\Http\Controllers\Sesicontroller;
use App\Http\Controllers\Userscontroller;
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
    // sesi login
    route::get('/',[Sesicontroller::class,'index'])->name('login');
    route::post('/',[Sesicontroller::class,'login']);
    // sesi register
    route::get('/register',[Registercontroller::class, 'index'])->name('register.index');
    route::post('/register',[Registercontroller::class, 'register']);
});


//admin
route::middleware(['auth'])->group(function(){
    route::get('/admin',[Admincontroller::class, 'index'])->middleware('userAkses:admin')->name('admin.index');
    route::get('/logout', [Sesicontroller::class, 'logout']);
    // halaman daftar user
    route::get('/daftarUser', [Userscontroller::class, 'index'])->name('daftarUser.index');
    route::get('/daftarUser/edit/{id}', [Userscontroller::class, 'edit'])->name('daftarUser.edit');
    route::PUT('/daftarUser/edit/{id}', [Userscontroller::class, 'update'])->name('daftarUser.update');
    route::get('/daftarUser/delete/{id}', [Userscontroller::class, 'destroy'])->name('daftarUser.delete');

    // halmaan rekap tranasaksi
    route::get('/rekapTransactions', [rekapTransactionscontroller::class, 'index'])->name('rekapTransactions.index');
    // halmaan reward dan history reward
    route::get('/rewardAdmin', [AdminRewardcontroller::class, 'index'])->name('rewardAdmin.index');
    route::get('/rewardAdmin/add', [AdminRewardcontroller::class, 'create'])->name('rewardAdmin.create');
    route::post('/rewardAdmin/add', [AdminRewardcontroller::class, 'store'])->name('rewardAdmin.store');
    route::get('/rewardAdmin/edit/{id}', [AdminRewardcontroller::class, 'edit'])->name('rewardAdmin.edit');
    route::PUT('/rewardAdmin/edit/{id}', [AdminRewardcontroller::class, 'update'])->name('rewardAdmin.update');
    route::get('/rewardAdmin/delete/{id}', [AdminRewardcontroller::class, 'destroy'])->name('rewardAdmin.delete');
    
});

















//pengguna
route::middleware(['auth'])->group(function(){
    route::get('/pengguna',[Penggunacontroller::class, 'index'])->middleware('userAkses:pengguna')->name('pengguna.index');
    route::get('/logout',[Sesicontroller::class, 'logout']);
    route::get('/transaksiHarian',[DailyTransactionscontroller::class, 'index'])->name('transaksiHarian.index');
    route::get('/profil', [QrCodeController::class, 'index'])->name('profil.index');
    route::get('/rekapTransaksi', [CountTransactionscontroller::class, 'index'])->name('rekapTransaksi.index');
    
    // reward dan transaksi reward
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::post('/reward/tukar/{id}', [RewardController::class, 'tukar'])->name('reward.tukar');
    Route::get('/histroyReward', [Rewardtransactioncontroller::class, 'index'])->middleware('auth')->name('historyReward.index');
});

//qr code generate
route::get('/qrcode', [QrCodeController::class, 'show']);

//reward transaction
route::get('/rewardtransaction', [Rewardtransactioncontroller::class, 'index'])->name('rewardtransaction.index');



//point
route::get('/point', [Pointcontroller::class, 'index'])->name('point.index');

//daily transactions
route::get('/dailytransactions', [DailyTransactionscontroller::class, 'index'])->name('dailyTrans.index');

//count transactions
route::get('/countTransactions', [CountTransactionscontroller::class, 'index'])->name('countTransaction.index');