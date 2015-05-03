<?php

/*
|--------------------------------------------------------------------------
| Origami Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('welcome/origami', array(
	'uses'=>'OrigamiController@welcome'
	));

//Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
Route::group(['prefix' => 'admin'], function() {

	Route::pattern('id', '[0-9]+');
	Route::pattern('slug', '[a-z0-9-]+');

# controllers
//	Route::resource('themes', 'ThemesController');
	Route::get('themes/', array(
//		'as'=>'themes.edit',
		'uses'=>'ThemesController@index'
		));
	Route::get('themes/{slug}', array(
//		'as'=>'themes/{slug}',
		'uses'=>'ThemesController@edit'
		));
	Route::post('themes/{slug}', array(
		'as'=>'themes.update',
		'uses'=>'ThemesController@update'
		));

});
