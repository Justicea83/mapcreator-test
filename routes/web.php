<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/callback', [AuthController::class, 'getAccessToken'])->name('getAccessToken');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
   Route::get('/home', [HomeController::class, 'index'])->name('home');
   Route::get('/home/{id}/map-styles', [HomeController::class, 'mapStyles'])->name('mapStyles')->where('id', '[0-9]+');
   Route::get('/home/{id}/svg-sets', [HomeController::class, 'svgSets'])->name('SVGSets')->where('id', '[0-9]+');
});

