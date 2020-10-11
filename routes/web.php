<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware'=>"web"],function(){ 

Route::get('/employees', 'EmployeeController@show')->name('employees');
Route::get('/employees/add', 'EmployeeController@addEmployee')->name('employees.add');
Route::post('/employees/add', 'EmployeeController@saveEmployee')->name('employees.save');
Route::get('/employees/edit/{id}', 'EmployeeController@editEmployee')->name('employees.edit');
Route::post('/employees/edit/{id}', 'EmployeeController@updateEmployee')->name('employees.update');
Route::get('/employees/delete/{id}', 'EmployeeController@deleteEmployee')->name('employees.delete');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

});



