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

Route::get('/', 'LoginController@authenticated');
Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'LoginController@register')->name('register');
Route::post('login/validating', 'LoginController@logValidate')->name('checklogin');
Route::post('register/validating', 'LoginController@regValidate')->name('checkregister');

Route::middleware('auth')->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('trash', 'HomeController@trash')->name('trash');
    Route::get('folder/{route}', 'HomeController@inFolder');
    Route::get('file/{route}', 'HomeController@viewFile');
    Route::get('folder', 'LoginController@authenticated');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::get('share', 'HomeController@share')->name('share');
    Route::get('share/{route}', 'HomeController@shareInFolder');

    Route::post('create/folder', 'FolderController@create');
    Route::put('create/folder/{route}', 'FolderController@createInFolder');
    Route::put('rename/folder/{route}', 'FolderController@edit');
    Route::get('trash/folder/{route}', 'FolderController@trash');
    Route::get('restore/folder/{route}', 'FolderController@restore');
    Route::get('delete/folder/{route}', 'FolderController@delete');
    Route::put('share/folder/{route}', 'FolderController@share');

    Route::post('create/file', 'FileController@create');
    Route::put('create/file/{route}', 'FileController@createInFolder');
    Route::put('rename/file/{route}', 'FileController@edit');
    Route::get('trash/file/{route}', 'FileController@trash');
    Route::get('restore/file/{route}', 'FileController@restore');
    Route::get('delete/file/{route}', 'FileController@delete');
    Route::put('share/file/{route}', 'FileController@share');
    Route::get('view/{route}', 'HomeController@view');

    Route::get('hide/{route}', 'FileController@hide');
    Route::get('unhide/{route}', 'FileController@unhide');

    Route::put('edit/user/{id}', 'LoginController@edit');
});
