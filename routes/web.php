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



Route::post('/login/custom',[
    'uses'  =>'LoginController@login',
    'as'    =>  'login.custom'
]);


Route::group(['middleware' => 'auth'],function ()
{
   Route::get('/adminDashboard',function()
   {
       return view('adminDashboard');
   })->name('adminDashboard');

   Route::get('/employeeDashboard',function()
   {
       return view('employeeDashboard');
   })->name('employeeDashboard');
      Route::get('/secViewDashboard',function()
   {
       return view('secViewDashboard');
   })->name('secViewDashboard');

   Route::get('/secUpdatorDashboard',function()
   {
       return view('secUpdatorDashboard');
   })->name('secUpdatorDashboard');
   Route::get('/culturealOfficeDashboard',function()
   {
       return view('culturealOfficeDashboard');
   })->name('culturealOfficeDashboard');
   Route::get('/profile',function()
   {
       return view('profile');
   })->name('profile');

});

