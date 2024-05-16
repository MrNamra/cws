<?php

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


require_once __DIR__.'/auth.php';
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/clear', function () {
    Artisan::call('route:clear');
    return 'Route cache cleared successfully!';
});
Route::get('/helloworld', function () {
    echo "<h1>Hello World!</h1>";
});
Route::get('/answer', [NewsController::class, 'index'])->name('ans');
Route::get('/whatsnew', [NewsController::class, 'index'])->name('new');
Route::get('/news/{id}', [NewsController::class, 'raju'])->name('news1');
Route::post('/getdec/{id}', [CollegeController::class, 'getDescription'])->name('getDec');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::any('/news/connector', [NewsController::class, 'ckupload'])->middleware(['auth', 'verified'])->name('ckimg');
    Route::group(["prefix" => 'admin/'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
        Route::get('/getdep', [DashboardController::class, 'getdep'])->middleware(['auth', 'verified'])->name('getdep');
        Route::post('/addclg', [CollegeController::class, 'AddCollege'])->middleware(['auth', 'verified'])->name('addclg');
        Route::post('/adddep', [CollegeController::class, 'AddDepartment'])->middleware(['auth', 'verified'])->name('add_dep');
        Route::post('/addass', [CollegeController::class, 'AddAssignment'])->middleware(['auth', 'verified'])->name('addass');
        Route::get('/addnew', [DashboardController::class, 'AddForms'])->middleware(['auth', 'verified'])->name('addui');
        Route::get('/getFromData', [DashboardController::class, 'getAllDetailsById'])->middleware(['auth', 'verified'])->name('getFromData');
        Route::get('/postnews', [DashboardController::class, 'PostNews'])->middleware(['auth', 'verified'])->name('postnews');
        Route::post('/postnews', [NewsController::class, 'PostNews'])->middleware(['auth', 'verified'])->name('postnewscontent');
        Route::get('/report', [TicketController::class, 'ShowReport'])->middleware(['auth', 'verified'])->name('report');
        Route::get('/assignment', [DashboardController::class, 'ShowSubmitAssignment'])->middleware(['auth', 'verified'])->name('showsubassignment');

    });
});

Route::get('/{clg_name}', [HomeController::class, 'departments'])->where(['clg_name' => '[a-zA-Z]+'])->name('collage');
Route::get('/{clg_name}/{dep_name}', [HomeController::class, 'assignments'])->where(['clg_name' => '[a-zA-Z]+','dep_name' => '[a-zA-Z]+'])->name('dep');