<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;


Route::get('/', function () {   //เส้นทางไปยังหน้าแรก laravel
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),  //ไปยังหน้าล็อกอิน
        'canRegister' => Route::has('register'), //ไปยังหน้าลงทะเบียน
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {  //ไปยังหน้าdashboard
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { //หน้าโปรไฟล์
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy']) //เพิ่ม index', 'store', 'update', 'destroy เข้าไป
    ->middleware(['auth', 'verified']);
Route::resource('product', ProductController::class)
    ->only(['index', 'show',])  //นี่คือการเลือกเฉพาะสองฟังก์ชันคือ index (แสดงรายการทั้งหมดของสินค้า) และ show (แสดงรายละเอียดสินค้าเฉพาะตัว) เท่านั้นที่จะถูกกำหนดเส้นทาง
    ->middleware(['auth', 'verified']);

Route::get('/greeting', function () {
        return 'Hello World';
    });
Route::get('/user', [UserController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);


require __DIR__.'/auth.php';