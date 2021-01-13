<?php

use App\Post;
use App\User;
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

Route::get('/create', function () {
    $user = User::findOrFail(1);

    $user->posts()->save(
        new Post(['title' => 'my second post with Edwin Diaz', 'body' => 'I love laravel, with Edwin Diaz'])
    );
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->posts as $post) {
        echo $post->title . '<br>';
    }
});

Route::get('/update', function () {
    $user = User::findOrFail(1);

    $user->posts()->where('id', '=', 2)->update(['title' => 'I love laravel 2', 'body' => 'this is awesome, thank you Edwin 2']);

});

Route::get('/delete', function () {
    $user = User::findOrFail(1);

    $user->posts()->whereId(4)->delete();
});
