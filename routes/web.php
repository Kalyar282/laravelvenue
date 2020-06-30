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

Route::get('master', function () {
    return view('backend.master');
});

Route::resource('categories', 'backend\CategoryController');

Route::resource('locations', 'backend\LocationController');

Route::resource('subcategories', 'backend\SubcategoryController');

Route::resource('rooms', 'backend\RoomController');

Route::get('/get',function(){
	echo "<h1>Made a conflit</h1>";
});