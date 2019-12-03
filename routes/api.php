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
Route::get('/', function () {
    return response()->json(['ok'=>'pos ya estaría']);
});

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::prefix('admin')->namespace('Admin')->middleware([

])->group(function (){
    Route::resource('user', "UserController")->except(['create','edit']);
    Route::resource('task', "TaskController")->except(['create','edit']);
    Route::resource('taskList', "TaskListController")->except(['create','edit']);
    Route::resource('group', "GroupController")->except(['create','edit']);
    Route::resource('tag', "TagController")->except(['create','edit']);
    Route::resource('event', "EventController")->except(['create','edit']);
});



