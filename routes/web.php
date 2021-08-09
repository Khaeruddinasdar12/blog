<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;

Auth::routes();
Route::get('/', App\Http\Livewire\Home::class);
Route::get('/contact', App\Http\Livewire\Contact::class);
Route::get('/about', App\Http\Livewire\About::class);
Route::get('/blog', App\Http\Livewire\BlogIndex::class);
Route::get('/blog/{category}', App\Http\Livewire\BlogCategory::class);
Route::get('/blog/{category}/{slug}', App\Http\Livewire\BlogDetail::class);

Route::prefix('admin')->group(function() {
    Route::get('/manage-blog', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/manage-blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/manage-blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/manage-blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/manage-blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/manage-blog/show/{id}', [BlogController::class, 'edit'])->name('blog.show');

    Route::get('/table-blog', [BlogController::class, 'tableBlog'])->name('table.blog');
});


