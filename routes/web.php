<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepairRequestController;

Route::get('/', function () {
    return view('welcome');
});

// เส้นทางสำหรับแสดงฟอร์มการกรอกข้อมูลการแจ้งซ่อม
Route::get('/repair/create', [RepairRequestController::class, 'create'])->name('repair.create');

// เส้นทางสำหรับบันทึกข้อมูลการแจ้งซ่อม
Route::post('/repair', [RepairRequestController::class, 'store'])->name('repair.store');

// เส้นทางสำหรับแสดงรายการแจ้งซ่อม
Route::get('/repair', [RepairRequestController::class, 'index'])->name('repair.index');

// Route สำหรับลบรายการแจ้งซ่อม
Route::delete('/repair/{id}', [RepairRequestController::class, 'destroy'])->name('repair.destroy');

// แสดงฟอร์มแก้ไข
Route::get('/repair/{id}/edit', [RepairRequestController::class, 'edit'])->name('repair.edit');

// บันทึกการแก้ไขข้อมูล
Route::put('/repair/{id}', [RepairRequestController::class, 'update'])->name('repair.update');

Route::get('/repair/{id}', [RepairRequestController::class, 'show'])->name('repair.show');
