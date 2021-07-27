<?php
use App\Http\Controllers\CityController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\FrontController;



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
Route::get('/admin/cities','CityController@indexCity');
Route::view('/Admin/AddNewCity','AddCity');
Route::post('/Admin/AddCity','CityController@AddNewCity');
Route::get ('/admin/EditCity/{id}','CityController@EditCity');
Route::get ('/admin/deletecity/{id}','CityController@deletecity');
Route::post ('/admin/updatecity/{id}','CityController@updatecity');
Route::get('/citycat','RelationController@getcat');
Route::get('/admin/GetDetails/{id}','RelationController@GetDetails');
Route::get('/admin/AddCategory','RelationController@AddCategory');
Route::post('/AddCategory','RelationController@AddNewCategory');
Route::get('/admin/AddPlace/{id}','RelationController@AddPlace');
Route::get('/admin/AddNewPlace/{id}','RelationController@AddNewPlace');
Route::post('/admin/SaveNewplace/{id}','RelationController@SaveNewplace');
Route::get('/placeDetails/{id}','FrontController@Details');