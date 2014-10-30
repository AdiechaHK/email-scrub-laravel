<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/api', 'HomeController@api');

Route::get('/csv', 'HomeController@csv');

Route::post('/csv', 'HomeController@submitCsv');

Route::get('/validateEmail/{email}', 'HomeController@validateEmail');

Route::get('/design', 'HomeController@design');

Route::post('/report', 'HomeController@report');

Route::get('ui', 'HomeController@ui');

Route::post('upload_csv', 'HomeController@upload_csv');