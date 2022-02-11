<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Content\MenuController;
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
        Route::prefix('category')->group(function () {
            Route::get('/', [ContentCategoryController::class, 'index'])->name('admin.content.category.index');
            Route::get('/create', [ContentCategoryController::class, 'create'])->name('admin.content.category.create');
            Route::post('/store', [ContentCategoryController::class, 'store'])->name('admin.content.category.store');
            Route::get('/edit/{postCategory}', [ContentCategoryController::class, 'edit'])->name('admin.content.category.edit');
            Route::put('/update/{postCategory}', [ContentCategoryController::class, 'update'])->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}', [ContentCategoryController::class, 'destroy'])->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('admin.content.category.status');
        });
        // post //
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.content.post.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.content.post.store');
            Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.content.post.edit');
            Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.content.post.update');
            Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('admin.content.post.destroy');
            Route::get('/status/{post}', [PostController::class, 'status'])->name('admin.content.post.status');
            Route::get('/commentable/{post}', [PostController::class, 'commentable'])->name('admin.content.post.commentable');
        });
        //comment
        Route::prefix('comment')->group(function () {
            Route::get('/', [ContentCommentController::class, 'index'])->name('admin.content.comment.index');
            Route::get('/show/{comment}', [ContentCommentController::class, 'show'])->name('admin.content.comment.show');
            Route::delete('/destroy/{comment}', [ContentCommentController::class, 'destroy'])->name('admin.content.comment.destroy');
            Route::get('/approved/{comment}', [ContentCommentController::class, 'approved'])->name('admin.content.comment.approved');
            Route::get('/status/{comment}', [ContentCommentController::class, 'status'])->name('admin.content.comment.status');
            Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'])->name('admin.content.comment.answer');
        });
        //menu
        Route::prefix('menu')->group(function (){
            Route::get('/',[MenuController::class,'index'])->name('admin.content.menu.index');
            Route::get('/create',[MenuController::class,'create'])->name('admin.content.menu.create');
            Route::post('/store',[MenuController::class,'store'])->name('admin.content.menu.store');
            Route::get('/edit/{menu}', [MenuController::class, 'edit'])->name('admin.content.menu.edit');
            Route::put('/update/{menu}', [MenuController::class, 'update'])->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', [MenuController::class, 'destroy'])->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', [MenuController::class, 'status'])->name('admin.content.menu.status');
        });
    });
});
