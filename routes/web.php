<?php

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubmitAssignmentController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

require_once __DIR__.'/auth.php';
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/clear', function () {
    Artisan::call('route:clear');
    return 'Route cache cleared successfully!';
});
Route::get('/helloworld', function () {
    echo "<h1>Hello World!</h1>";
});
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/answer', [SubmitAssignmentController::class, 'index'])->name('ans');
Route::get('/whatsnew', [NewsController::class, 'index'])->name('new');
Route::get('/whatsnew/news{id}', [NewsController::class, 'GetNewsByID'])->where('id', '[0-9]+')->name('newsid');
Route::get('/news/{id}', [NewsController::class, 'raju'])->name('news1');
Route::post('/getdec/{id}', [CollegeController::class, 'getDescription'])->name('getDec');
Route::post('/submitreport', [TicketController::class, 'CreateTicket'])->name('reported');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::any('/news/connector', [NewsController::class, 'ckupload'])->name('ckimg');
    
    Route::group(["prefix" => 'admin/'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/getdep', [DashboardController::class, 'getdep'])->name('getdep');
        Route::post('/addclg', [CollegeController::class, 'AddCollege'])->name('addclg');
        Route::post('/adddep', [CollegeController::class, 'AddDepartment'])->name('add_dep');
        Route::post('/addass', [CollegeController::class, 'AddAssignment'])->name('addass');
        Route::delete('/deleteass', [CollegeController::class, 'DeleteAssignment'])->name('deleteass');
        Route::get('/addnew', [DashboardController::class, 'AddForms'])->name('addui');
        Route::get('/getFromData', [DashboardController::class, 'getAllDetailsById'])->name('getFromData');
        Route::get('/postnews', [DashboardController::class, 'PostNews'])->name('postnews');
        Route::post('/postnews', [NewsController::class, 'PostNews'])->name('postnewscontent');
        Route::get('/postnews/{id}', [NewsController::class, 'UpdateNews'])->where('id', '[0-9]+')->name('updatenews');
        Route::get('/viewreport', [TicketController::class, 'ShowReport'])->name('report');
        Route::patch('/closereport', [TicketController::class, 'CloseReport'])->name('closeTicket');
        Route::get('/assignment', [DashboardController::class, 'ShowSubmitAssignment'])->name('showsubassignment');

    });
});

Route::get('/{clg_name}', [HomeController::class, 'departments'])->where(['clg_name' => '[a-zA-Z]+'])->name('collage');
Route::get('/{clg_name}/{dep_name}', [HomeController::class, 'assignments'])->where(['clg_name' => '[a-zA-Z]+','dep_name' => '[a-zA-Z]+'])->name('dep');