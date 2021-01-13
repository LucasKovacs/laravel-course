<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
Route::post('/posts', 'PostController@store')->name('post.store');
Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');
Route::delete('/posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
