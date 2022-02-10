<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/


Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    Route::prefix('content')->namespace('Content')->group(function () {
        // category //
        Route::prefix('category')->group(function (){
            Route::get('/',[ContentCategoryController::class,'index'])->name('admin.content.category.index');
            Route::get('/create',[ContentCategoryController::class,'create'])->name('admin.content.category.create');
            Route::post('/store',[ContentCategoryController::class,'store'])->name('admin.content.category.store');
            Route::get('/edit/{postCategory}',[ContentCategoryController::class,'edit'])->name('admin.content.category.edit');
            Route::put('/update/{postCategory}',[ContentCategoryController::class,'update'])->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}',[ContentCategoryController::class,'destroy'])->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('admin.content.category.status');
        });
    });


});