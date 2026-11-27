<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/about', [PageController::class, 'about'])->name('about');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/about', [PageController::class, 'editAbout'])->name('admin.about.edit');
    Route::post('/admin/about', [PageController::class, 'updateAbout'])->name('admin.about.update');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $tools = \App\Models\Tool::all();
    return view('dashboard', compact('tools'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Оформление заказа
    Route::post('/order/{tool}', [OrderController::class, 'store'])->name('orders.store');
});

// Маршруты только для администратора
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');
    
    // Управление инструментами
    Route::get('/admin/tools', [ToolController::class, 'index'])->name('admin.tools.index');
    Route::get('/admin/tools/create', [ToolController::class, 'create'])->name('admin.tools.create');
    Route::post('/admin/tools', [ToolController::class, 'store'])->name('admin.tools.store');
    
    // Управление заказами (используем index, а не dexing)
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::patch('/admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});

require __DIR__.'/auth.php';