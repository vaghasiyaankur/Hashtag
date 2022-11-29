<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HashtagController;
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
    return view('Home.index');
});

Route::get('/form', function () {
    return view('Form.index');
});

Route::get('/view', function () {
    return view('View.index');
});

Route::post('add-hashtag', [HashtagController::class, 'store'])->name('add.hashtag');
Route::get('/list-hashtag', [HashtagController::class, 'index'])->name('list.hashtag');


