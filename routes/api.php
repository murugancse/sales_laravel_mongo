<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [App\Http\Controllers\API\LoginController::class, 'login']);
Route::post('sendmail', [App\Http\Controllers\API\LoginController::class, 'SendMail']);


Route::middleware('auth:api')->post('/details', function (Request $request) {
     $user = Auth::user();
     if($user->is_admin==1){
     	return Category::with('products')->get();
     }else{
     	return 'You dont have access to view these details';
     }
	 
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {

    Route::post("create-task", [App\Http\Controllers\API\TaskController::class, 'createTask'] );

    Route::get("tasks", "App\Http\Controllers\API\TaskController@tasks");

    Route::get("task/{task_id}", "App\Http\Controllers\API\TaskController@task");

    Route::delete("task/{task_id}", "App\Http\Controllers\API\TaskController@deleteTask");

});