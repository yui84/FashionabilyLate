<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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


//管理画面表示
Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactController::class, 'admin']);
});

//問い合わせフォーム表示
Route::get('/', [ContactController::class, 'index']);

//問い合わせ確認にデータ送信・問い合わせ確認表示
Route::post('/confirm', [ContactController::class, 'confirm']);

//DBにデータ送信・thanks表示
Route::post('/thanks', [ContactController::class, 'store']);