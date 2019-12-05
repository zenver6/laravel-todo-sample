<?php

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


// Route::domain('admin.localhost')->group(function () {
//     Route::get('/', function () {
//         return view('admin/home');
//     });
//     Route::post('/api/admin/user', 'Admin/UserController@index')->name('admin/user');
// });


Route::group(['namespace' => 'Admin', 'domain' => 'admin.localhost'], function () {
    // Route::group(['domain' => 'admin.localhost'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');
        Route::get('/user', 'UserController@index')->name('admin.users');
    });
});



Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
    Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{folder}/tasks/create', 'TaskController@create');
    Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');

    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');
});

Auth::routes();
