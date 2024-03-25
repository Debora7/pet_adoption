<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnounceController;

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
    return view('welcome');
});

Route::post('/add-announce', [AnnounceController::class, 'store'])->name('add-announce');
Route::get('/show-announcements', [AnnounceController::class, 'index'])->name('show-announcements');
Route::get('/get-tags', [AnnounceController::class, 'getTags'])->name('get-tags');