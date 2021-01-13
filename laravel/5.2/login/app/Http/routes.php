<?php

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/', function () {
if (Auth::check()) {
return 'the user is logged in';
}
});*/

/*Route::get('/', function () {
$username = 'dev@yopmail.com';
$password = '123456789';
if (Auth::attempt(['email' => $username, 'password' => $password])) {
return redirect()->intended('/admin');
}
});*/

Route::auth();

Route::get('/home', 'HomeController@index');
