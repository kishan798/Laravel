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



Route::middleware('auth')->post('/teams', function () {

	


	auth()->user()->team()->create(

	request()->validate(['name' => 'required'])

	);

	

	return redirect('/');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
