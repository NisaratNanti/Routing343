<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController; 

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
// Route::resource('employee', EmployeeController::class) ->only(['index'])

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// หน้าแบบฟอร์มสำหรับเพิ่มข้อมูลพนักงาน
Route::get('/employees/create', [EmployeeController::class, 'create']) ->name('employees.create');

// Function เส้นทางสำหรับบันทึกข้อมูลพนักงาน
Route::post('/employees', [EmployeeController::class, 'store']) ->name('employees.store');

require __DIR__.'/auth.php';
