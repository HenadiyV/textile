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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Textile','prefix'=>'textile'],function(){
    Route::resource('products','ProductController')->names('textile.products');
});

//Route::resource('rest','RestTestController')->names('restTest');

// Админка
$groupData=[
    'namespace' => 'Textile\Admin',
    'prefix'    => 'admin/textile',
];
Route::group($groupData, function(){
   //TextileCategory
    $methods=['index','edit','update','create','store',];
    Route::resource('categories','CategoryController')
        ->only($methods)
        ->names('textile.admin.categories');
});
