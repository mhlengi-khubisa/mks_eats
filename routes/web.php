<?php
use App\Http\Controllers\{AdminAuthController,PayFastController,StorefrontController};
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [StorefrontController::class, 'home'])->name('home');
Route::get('/shop', [StorefrontController::class, 'catalogue'])->name('products.index');
Route::get('/products/{slug}', [StorefrontController::class, 'product'])->name('products.show');
Route::get('/stores/{slug}', [StorefrontController::class, 'vendor'])->name('vendors.show');
Route::get('/payment/{order}/return', [PayFastController::class, 'returned'])->name('payment.return');
Route::get('/payment/{order}/cancel', [PayFastController::class, 'cancelled'])->name('payment.cancel');
Route::post('/payments/payfast/notify', [PayFastController::class, 'notify'])->name('payment.notify');
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', Dashboard::class)->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
