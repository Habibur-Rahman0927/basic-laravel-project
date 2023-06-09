<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});


// Admin all route

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','editProfile')->name('edit.profile');
    Route::post('/update/profile','updateProfile')->name('update.profile');
    Route::get('/change/password','changePassword')->name('change.password');
    Route::post('/update/password','updatePassword')->name('update.password');
});

Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide','homeSlider')->name('home.slide');
    Route::post('/update/slide','updateSlider')->name('update.slide');
});

Route::controller(AboutController::class)->group(function (){
    Route::get('/about/page','aboutPage')->name('about.page');
    Route::post('/update/about','updatePage')->name('update.about');
    Route::get('/about','homeAbout')->name('home.about');
    Route::get('/about/multi/image','aboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image','storeMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image','allMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}','editMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image/{id}','updateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}','deleteMultiImage')->name('delete.multi.image');
});

Route::controller(PortfolioController::class)->group(function (){
    Route::get('/all/portfolio/page','allPortfolio')->name('all.portfolio.page');
    Route::get('/all/portfolio','addPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio','storePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}','editPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio/{id}','updatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}','deletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}','portfolioDetails')->name('portfolio.details');
});

Route::controller(BlogCategoryController::class)->group(function (){
    Route::get('/all/blog/category/page','allBlogCategory')->name('all.blogs.category');
    Route::get('/all/blog/category','addBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category','storeBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}','editBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}','updateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}','deleteBlogCategory')->name('delete.blog.category');
    // Route::get('/portfolio/details/{id}','portfolioDetails')->name('portfolio.details');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
