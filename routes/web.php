<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServicesController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nosotros', function () {
    return view('nosotros');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/noticias', function () {
    return view('news.index');
});
Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/run-migrations', function () {
    return Artisan::call('migrate');
});

Route::get('/rollback-migrations', function () {
    return Artisan::call('migrate:rollback');
});

Auth::routes();

Route::feeds();
// Route::get('feed', Spatie\Feed\Http\FeedController::class)->name('feeds.main');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/services/get', [ServicesController::class, 'index']);
Route::apiResource('/news', NewsController::class);
Route::get('/noticias/{news}',[NewsController::class,'showView']);
Route::post('upload/news', [NewsController::class,'uploadImage']);

