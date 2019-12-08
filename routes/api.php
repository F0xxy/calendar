<?php


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

Route::post('/register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('login', 'AuthController@login');
Route::prefix('password')->group(function (){
    Route::post('forgot','Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('reset','Auth\ResetPasswordController@reset');
});

//Route::middleware('auth:api')->
Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');

});
Route::middleware('auth:api')->group(function (){
    Route::apiResource('task', "TaskController");
    Route::apiResource('tasklist', "TaskListController");
    Route::apiResource('group', "GroupController");
    Route::apiResource('tag', "TagController");
    Route::apiResource('event', "EventController");
    Route::apiResource('category', "CategoryController");
});





