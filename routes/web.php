<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'basicauth'], function() {
    
Auth::routes(['register' => true]);

Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
Route::get('/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);


Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);

});

Route::post('/edit_form', [App\Http\Controllers\ItemController::class, 'edit_form']);
Route::post('/delete_form', [App\Http\Controllers\ItemController::class, 'destory']);

Route::get('/display', [App\Http\Controllers\ItemController::class, 'display']);
Route::post('/posts/search', [App\Http\Controllers\ItemController::class, 'search'])->name('posts.search');
Route::post('/display/search', [App\Http\Controllers\ItemController::class, 'display_search'])->name('display.search');

Route::get('/detail/{id}', [App\Http\Controllers\StockController::class, 'detail'])->name('detail');

Route::get('/detail_form/{id}', [App\Http\Controllers\StockController::class, 'detail_form']);
Route::post('/detail_register', [App\Http\Controllers\StockController::class, 'detail_register']);

Route::get('/display/edit/{id}', [App\Http\Controllers\StockController::class, 'detail_edit']);
Route::post('/display/edit_form', [App\Http\Controllers\StockController::class, 'edit_form']);

Route::get('/display/delete/{id}', [App\Http\Controllers\StockController::class, 'delete']);
Route::post('/display/delete_form', [App\Http\Controllers\StockController::class, 'destory']);
});