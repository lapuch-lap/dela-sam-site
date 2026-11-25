<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

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
});

// Маршруты только для администратора
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');
    
    // Маршруты для инструментов
    Route::get('/admin/tools', [ToolController::class, 'index'])->name('admin.tools.index');
    Route::get('/admin/tools/create', [ToolController::class, 'create'])->name('admin.tools.create');
    Route::post('/admin/tools', [ToolController::class, 'store'])->name('admin.tools.store');
});
use App\Http\Controllers\AdminOrderController;

Route::middleware(['auth', 'admin'])->group(function () {
    // ... старые маршруты
    Route::get('/admin/orders', [AdminOrderController::class, 'dexing'])->name('admin.orders.index');
    Route::patch('/admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});

require __DIR__.'/auth.php';