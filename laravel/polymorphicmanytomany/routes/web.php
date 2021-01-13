<?php

use App\Post;
use App\Tag;
use App\Video;
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

Route::get('create', function () {
    $post = Post::create(['name' => 'my first post']);

    $tag1 = Tag::findOrFail(1);

    $post->tags()->save($tag1);

    // ---

    $video = Video::create(['name' => 'video.mov']);

    $tag2 = Tag::findOrFail(2);

    $video->tags()->save($tag2);

    return 'ok';
});

Route::get('read', function () {
    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag) {
        echo $tag;
    }
});

Route::get('update', function () {
    // option 1
    //$post = Post::findOrFail(1);

    //foreach ($post->tags as $tag) {
    //    return $tag->whereName('post')->update(['name' => 'JAVA']);
    //}

    $post = Post::findOrFail(1);
    $tag = Tag::findOrFail(3);

    // option 2
    //$post->tags()->save($tag);

    // option 3
    //$post->tags()->attach($tag);

    // option 4
    $post->tags()->sync([1, 2]);
});

Route::get('delete', function () {
    $post = Post::find(2);

    foreach ($post->tags as $tag) {
        $tag->whereId(4)->delete();
    }
});
