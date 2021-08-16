<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\KomentarController;

Auth::routes();
Route::get('/', App\Http\Livewire\Home::class);
Route::get('/contact', App\Http\Livewire\Contact::class);
Route::get('/about', App\Http\Livewire\About::class);
Route::get('/blog', App\Http\Livewire\BlogIndex::class);
Route::get('/blog/{category}', App\Http\Livewire\BlogCategory::class);
Route::get('/blog/{category}/{slug}', App\Http\Livewire\BlogDetail::class);

Route::prefix('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // MANAGE BLOG
    Route::get('/manage-blog', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/manage-blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/manage-blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/manage-blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/manage-blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/manage-blog/show/{id}', [BlogController::class, 'edit'])->name('blog.show');

    Route::get('/table-blog', [BlogController::class, 'tableBlog'])->name('table.blog');
    // END MANAGE BLOG

    // KOMENTAR
    Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
    // END KOMENTAR


    // MANAGE KATEGORI
    Route::get('/manage-kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/manage-kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/manage-kategori/update', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/manage-kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    Route::get('/table-kategori', [KategoriController::class, 'tableKategori'])->name('table.kategori');
    // END MANAGE KATEGORI


    // MANAGE PORTFOLIO
    Route::get('/manage-portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::post('/manage-portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/manage-portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::get('/manage-portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/manage-portfolio/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');

    Route::get('/table-portfolio', [PortfolioController::class, 'tablePortfolio'])->name('table.portfolio');
    // END MANAGE PORTFOLIO


    // MEMBER
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    // END MEMBER


});


