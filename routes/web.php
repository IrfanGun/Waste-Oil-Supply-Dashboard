<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuplaiController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserPendingController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WalletTransaction;
use App\Livewire\UserPending;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'can:pending'])->group(function () {
    Route::get('/pending',[UserPendingController::class, 'index'])->name('pending');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware(['auth', 'can:manage user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('can:manage penarikan')->group(function () {

        Route::get('/transaksi/dompet', [WalletController::class, 'dompet'])->name('transaksi.dompet');
        Route::post('/livewire/top-up-modal', [WalletController::class, 'penarikan'])->name('transaksi.penarikan');
        
    });

    Route::middleware('can:manage suplai')->group(function () {

        Route::get('/beranda/index', [SuplaiController::class, 'home'])->name('suplai.home');
        Route::post('/livewire/modal-suplai',[SuplaiController::class, 'create'])->name('suplai.create');
        
        // Route::resource('suplai', SuplaiController::class);
        // Route::post('/dashboard/suplai/store', [DashboardController::class, 'suplai'])->name('dashboard.suplai_store');
        // Route::get('/dashboard/suplai', [DashboardController::class, 'suplai'])->name('dashboard.suplai');
    });

    Route::get('pesan', [HelpdeskController::class, 'pesanUser'])->name('pesan.bantuan');

    Route::prefix('admin')->name('admin.')->group(function () {
   
       
        Route::middleware('can:manage user')->group(function () {
            Route::resource('beranda', UserAccountController::class);
        });

        Route::middleware('can:manage pengiriman')->group(function () {
            Route::resource('penjemputan', PengirimanController::class);
        });

        Route::middleware ('can:manage suplai')->group(function () {
            Route::resource('suplai', SuplaiController::class);
        });

        Route::middleware('can:manage bantuan')->group(function () {
            Route::resource('helpdesk', HelpdeskController::class);
        });

        Route::middleware('can:manage saldo')->group(function () {
            Route::resource('user', UserAccountController::class);
        });

        Route::middleware('can:manage penarikan')->group(function () {
            Route::resource('transaksi', WalletTransaction::class);
        });
        Route::get('pesan/{id}', [HelpdeskController::class, 'pesan'])->name('pesan');

        Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    
        Route::post('register', [RegisteredUserController::class, 'store']);

    });
 });

require __DIR__.'/auth.php';
