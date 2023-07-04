<?php

use App\Http\Controllers\WarungController;
use App\Http\Controllers\BarangController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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

// Home
Route::get('/', [HomeController::class, 'index']);

// Login Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/dashboard', [AdminController::class, 'adminLogin'])->name('admin_login');
Route::get('/admin/dashboard', [AdminController::class, 'show']);
Route::get('/admin/rekrutmen', [AdminController::class, 'showRekrut']);
Route::get('/admin/users', [AdminController::class, 'showUsers']);
Route::put('/status/{id}', [AdminController::class, 'updateStatus']);
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin_logout');


Route::get('/contact', function () {
    return view('user.home.contact', ['title' => 'Contact']);
});

// Profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);

// Warung
Route::get('/warung', [WarungController::class, 'index']);
Route::post('/warung', [WarungController::class, 'store']);
Route::get('/warung/{id}', [WarungController::class, 'show']);
Route::get('/warung/{id}/edit', [WarungController::class, 'edit']);
Route::put('/warung/{id}', [WarungController::class, 'update']);
Route::get('/warung/{id}/delete', [WarungController::class, 'destroy']);

// Barang
Route::get('/warung/{id}', [WarungController::class, 'showbarang']);
// Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'store']);
// Route::get('/barang/{id}', [BarangController::class, 'show']);
Route::get('/add-cart/{id}', [BarangController::class, 'addCart'])->name('add_cart');
Route::get('/keranjang', [BarangController::class, 'cart']);
Route::put('/update-cart', [BarangController::class, 'updateCart'])->name('update_cart');
Route::get('/hapus-cart/{id}', [BarangController::class, 'hapusCart'])->name('hapus_cart');
Route::get('/checkout', [BarangController::class, 'cartCheckout']);
// Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
Route::put('/barang/{id}', [BarangController::class, 'update']);
Route::get('/barang/{id}/delete', [BarangController::class, 'destroy']);

// Order
Route::get('/order', [BarangController::class, 'order']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/bukti/{id}', [OrderController::class, 'update']);
Route::get('/order/{id}/delete', [OrderController::class, 'destroy']);

Route::get('/get-item-quantity/{id}', function ($id) {
    $item = Barang::find($id);
    if ($item) {
        return response()->json(['quantity' => $item->jumlah]);
    } else {
        return response()->json(['error' => 'Item not found'], 404);
    }
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
