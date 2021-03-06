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
use \App\Product;
Route::get('/', function () {
		$viewBag['products'] = Product::all();
		return view('home', $viewBag);
});
Route::post('request/product', ['as' => 'request-product', 'uses' => 'ProductsController@sendRequest']);			