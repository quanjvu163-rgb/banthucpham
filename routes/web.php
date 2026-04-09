<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/index.php', [HomeController::class, 'index']);

Route::get('/sanpham', [ProductController::class, 'index']);
Route::get('/sanpham/index.php', [ProductController::class, 'index']);
Route::match(['get', 'post'], '/sanpham/actionSanpham.php', [ProductController::class, 'action']);
Route::match(['get', 'post'], '/sanpham/actionSanPham.php', [ProductController::class, 'action']);
Route::get('/sanpham/infoProduct.php', [ProductController::class, 'show']);
Route::post('/sanpham/actionComment.php', [ProductController::class, 'comment']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/index.php', [CartController::class, 'index']);
Route::match(['get', 'post'], '/cart/add.php', [CartController::class, 'add']);
Route::get('/cart/actionCart.php', [CartController::class, 'remove']);

Route::get('/order/index.php', [OrderController::class, 'index']);
Route::post('/order/saveorder.php', [OrderController::class, 'save']);
Route::match(['get', 'post'], '/order/phuongthucthanhtoan.php', [OrderController::class, 'payment']);
Route::match(['get', 'post'], '/order/suaOrder.php', [OrderController::class, 'edit']);
Route::match(['get', 'post'], '/order/dathang.php', [OrderController::class, 'place']);
Route::match(['get', 'post'], '/order/finish.php', [OrderController::class, 'finish']);
Route::get('/historyOrder.php', [OrderController::class, 'history']);

Route::match(['get', 'post'], '/ThanhVien/login.php', [AuthController::class, 'login']);
Route::match(['get', 'post'], '/ThanhVien/login_submit.php', [AuthController::class, 'login']);
Route::match(['get', 'post'], '/ThanhVien/register.php', [AuthController::class, 'register']);
Route::match(['get', 'post'], '/ThanhVien/register_submit.php', [AuthController::class, 'register']);
Route::get('/ThanhVien/logout.php', [AuthController::class, 'logout']);
Route::get('/ThanhVien/profile.php', [AuthController::class, 'profile']);
Route::match(['get', 'post'], '/ThanhVien/profilefix.php', [AuthController::class, 'profileFix']);
Route::match(['get', 'post'], '/ThanhVien/changePassword.php', [AuthController::class, 'changePassword']);

Route::get('/contact.php', [ContactController::class, 'show']);
Route::post('/contact.php', [ContactController::class, 'send']);

Route::match(['get', 'post'], '/admin/login.php', [AdminAuthController::class, 'login']);
Route::get('/admin/logout.php', [AdminAuthController::class, 'logout']);
Route::match(['get', 'post'], '/admin/index.php', [AdminController::class, 'index']);
Route::get('/admin', function () {
    return redirect()->to(url('/admin/index.php'), 302);
});
