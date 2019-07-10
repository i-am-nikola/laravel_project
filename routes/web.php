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

Route::get('/', function () {
  return view('welcome');
});

Route::prefix('admin')->group(function () {
  Route::prefix('category')->group(function () {
    Route::get('list', 'CategoryController@getList')->name('admin.cate.getList');
    Route::get('add', 'CategoryController@getAdd')->name('admin.cate.getAdd');
    Route::post('add', 'CategoryController@postAdd')->name('admin.cate.postAdd');
    Route::get('delete/{id}', 'CategoryController@getDelete')->name('admin.cate.getDelete');
    Route::get('edit/{id}', 'CategoryController@getEdit')->name('admin.cate.getEdit');
    Route::post('edit/{id}', 'CategoryController@postEdit')->name('admin.cate.postEdit');
  });

  Route::prefix('product')->group(function () {
    Route::get('add', 'ProductController@getAdd')->name('admin.product.getAdd');
    Route::post('add', 'ProductController@postAdd')->name('admin.product.postAdd');
  });
});
