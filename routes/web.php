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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_employer');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//Route::resource('/category', 'App\Http\Controllers\CategoryController');

Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => 'auth' ], function(){
	Route::resource('category', 'App\Http\Controllers\CategoryController');
	Route::resource('product', 'App\Http\Controllers\ProductController');
	Route::get('/delete-product', [App\Http\Controllers\ProductController::class, 'Delete'])->name('delete.product');
});

Route::resource('salesproduct', 'App\Http\Controllers\SalesProductController')->middleware('is_employer');
Route::post('/get-categoryproducts', [App\Http\Controllers\SalesProductController::class, 'GetProducts']);

Route::get('/unsubscribe', [App\Http\Controllers\HomeController::class, 'unsubscribe'])->name('unsubscribe');
//Route::get('/unsubscribe', function () {
//    //dd(request()->hasValidSignature());
//    dd(request()->all());
//})->name('unsubscribe');
