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

/*
|--------------------
| Recipe Routes
|--------------------
|
*/
Route::post('/addrecipe', 'RecipeController@add_recipe');
Route::get('/recipe/{id}', 'RecipeController@show_recipe');
Route::delete('/recipe/{id}', 'RecipeController@destroy');


/*
|--------------------
| Sidebar Routes
|--------------------
|
*/
Route::get('/favorite/{id}', 'SidebarController@add_favorite');
Route::post('/fridge', 'SidebarController@fridge_item');
Route::post('/shoplist', 'SidebarController@shop_item');
Route::delete('/removefridge', 'SidebarController@remove_fridge');
Route::delete('/removeshop', 'SidebarController@remove_shop');