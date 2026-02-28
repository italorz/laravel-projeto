<?php

use App\Http\Controllers\AutomovelController;
use Illuminate\Support\Facades\Route;

Route::prefix('/automovel')->name('automovel.')->group(function () {
    Route::get('/', [AutomovelController::class, 'index'])->name('index');
    Route::get('/create', [AutomovelController::class, 'create'])->name('create');
    Route::post('/', [AutomovelController::class, 'store'])->name('store');
    Route::get('/{automovel}', [AutomovelController::class, 'show'])->name('show');
    Route::get('/{automovel}/edit', [AutomovelController::class, 'edit'])->name('edit');
    Route::put('/{automovel}', [AutomovelController::class, 'update'])->name('update');
    Route::delete('/{automovel}', [AutomovelController::class, 'destroy'])->name('destroy');
});


Route::get('/', function () {
    return redirect()->route('automovel.index');
});
