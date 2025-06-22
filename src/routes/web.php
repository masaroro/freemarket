<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('order');
// });

Route::get('/', [ItemController::class, 'index']);

Route::get('/item/{item_id}', [ItemController::class, 'detail']);

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/purchase/{item_id}', [OrderController::class, 'index']);
  Route::get('/purchase/address/{item_id}', [OrderController::class, 'edit']);
  Route::get('/sell', [OrderController::class, 'create']);
  Route::get('/mypage', [ProfileController::class, 'index']);
  Route::get('/mypage/profile', [ProfileController::class, 'edit']);
});