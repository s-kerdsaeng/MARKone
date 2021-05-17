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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::resource('mechanics','MechanicsController');
/* บังคับให้ login ก่อน 
route::resource('mechanics','MechanicsController')->middleware('auth');*/

route::resource('drivers','DriversController');

route::resource('trucks','TrucksController');

route::resource('customers','CustomersController');

route::resource('products','ProductsController');

route::resource('billas','BillasController');

route::resource('billbs','BillbsController');

route::resource('diesels','DieselsController');

route::resource('tasks','TasksController');

route::resource('teaks','TeaksController');

route::resource('teakdetails','TeakdetailsController');

route::resource('billdetails','BilldetailsController');

route::resource('productdetails','ProductdetailsController');
 
/* route::delete('billbs/{id}/edit','BillbsController@destroybilldetails');
 */