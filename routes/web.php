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

Route::get('/',  [HashtagController::class, 'hashtagList'])->name('home.index');
Route::get('/form', function () {
    return view('Form.index');
})->name('show.form');

Route::get('/view', [HashtagController::class, 'index'])->name('list.hashtag');

Route::post('add-hashtag', [HashtagController::class, 'store'])->name('add.hashtag');
// Route::get('/list-hashtag', [HashtagController::class, 'index'])->name('list.hashtag');


Route::get('image-download/{image}', [HashtagController::class, 'downloadImage'])->name('download.image');
