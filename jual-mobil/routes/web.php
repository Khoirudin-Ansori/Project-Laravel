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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// adddata
Route::post('/mobil/create', 'HomeController@create');
// editdata

Route::get('/mobil/edit/{id}','HomeController@edit');
Route::post('/mobil/{id}/update','HomeController@update');
// detail
Route::get('/mobil/detail/{id}','HomeController@detail');
// softdelete
Route::get('/mobil/hapus/{id}','HomeController@delete');
// restore data
Route::get('mobil/trash','HomeController@trash');
Route::get('/mobil/restore/{id}', 'HomeController@restore');
Route::get('mobil/restoreall','HomeController@restoreall');
// download as excel & pdf
route::get('mobil/downloadasexcel','HomeController@downloadasexcel')->name('downloadasexcel');
Route::get('mobil/downlaodaspdf', 'HomeController@downlaodaspdf')->name('downlaodaspdf');
// changepass
Route::get('home/admin','AdminController@index')->name('admin.index');
Route::get('password','ChangePasswordController@change')->name('cangepassword');
Route::put('password','ChangePasswordController@update')->name('updatepassword');
// importexcel
Route::post('/mobil/import_excel', 'HomeController@import_excel');
// forgetpass
Auth::routes();
Auth::routes(['verify' => true]);
//count
Route::get('mobil/total','HomeController@total')->name('total');