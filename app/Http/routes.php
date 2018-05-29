<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return "<h1>Wogga wogga</h1>";
// });

Route::get('/', 'PagesController@index'); // this calls the pages controller class with the index method

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

// Dynamic routing below
// Route::get('/user/{id}/{name}', function ($id, $name) {
//     return 'Welcome, user ' .$name. ', your id is: ' .$id; // this a user with id
// });