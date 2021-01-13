<?php

use App\User;
use Carbon\Carbon;

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

/**
 * BASE PATH = http://localhost:8080/cms/public/
 */

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/about', function () {
return 'Hi About Page';
});

Route::get('/contact', function () {
return 'Hi I am "Contact"';
});

Route::get('/post/{id}/{name}', function ($id, $name) {

return 'This is post number ' . $id . ' ' . $name;
});

Route::get('admin/posts/example', ['as' => 'admin.home', function () {

$url = route('admin.home');

return 'This url is ' . $url;
}]);*/

//Route::get('/post/{id}', 'PostsController@index');

//Route::resource('posts', 'PostsController');

//Route::get('contact', 'PostsController@contact');

//Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
 */

// Route::get('/insert', function () {

//     DB::insert('INSERT INTO posts (title, content) values (?, ?)', ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP']);
// });

// Route::get('/read', function () {

//     $results = DB::select('SELECT * FROM posts WHERE id = ?', [1]); //stdClass object

//     //return $results;
//     //var_dump($results);

//     if (count($results)) {

//         foreach($results as $post) {

//             return $post->title;
//         }
//     }

// });

// Route::get('/update', function () {

//     $updated = DB::update('UPDATE posts SET title = "Updated Title" WHERE id = ?', [1]);

//     return $updated;
// });

// Route::get('/delete', function () {

//     $deleted = DB::delete('DELETE FROM posts WHERE id = ?', [1]);

//     return $deleted;
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
 */

// Route::get('/read', function() {

//     $posts = Post::all();

//     foreach ($posts as $post) {

//         return $post->title;
//     }
// });

// Route::get('/find', function() {

//     $post = Post::find(1);

//     return $post->title;
// });

// Route::get('/find-where', function(){

//     $posts = Post::where('id', 1)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;
// });

// Route::get('/insert', function () {

//     DB::insert('INSERT INTO posts (title, content) values (?, ?)', ['Laravel is awesome with Edwin', 'Laravel is the best thing that has happened to PHP, PERIOD']);
// });

// Route::get('/find-more', function () {

//     // $posts = Post::findOrFail(3);

//     // return $posts;

//     $posts = Post::where('users_count', '<', 50)->firstOrFail();

// });

// Route::get('/basic-insert', function () {

//     $post = new Post;

//     $post->title = 'New Eloquent title insert';
//     $post->content = 'Wow eloquent is really cool, look at this content';

//     $post->save();
// });

// Route::get('/basic-insert2', function () {

//     $post = Post::find(1);

//     $post->title = 'New Eloquent title insert';
//     $post->content = 'Wow eloquent is really cool, look at this content';

//     $post->save();
// });

// Route::get('/create', function () {

//     Post::create([
//         'title' => 'the create method',
//         'content' => 'WOW I\'m learning a lot with Edwin Diaz'
//     ]);
// });

// Route::get('/update', function () {

//     Post::where('id', 1)->where('is_admin', 0)->update([
//         'title' => 'NEW PHP TITLE',
//         'content' => 'I love my instructor Edwin'
//     ]);
// });

// Route::get('/delete', function () {

//     $post = Post::find(1);

//     $post->delete();
// });

// Route::get('/delete2', function () {

//     Post::destroy([3,4]);

//     //Post::where('is_admin', 0)->delete();
// });

// Route::get('/soft-delete', function () {

//     Post::find(2)->delete();
// });

// Route::get('/read-soft-delete', function () {

//     // $post = Post::find(1);

//     // return $post;

//     // gets all trashed and not trashed
//     //$post = Post::withTrashed()->where('is_admin', 0)->get();

//     // return $post;

//     // gets only trashed elements
//     //$post = Post::onlyTrashed()->where('id', 1)->get();
//     $post = Post::onlyTrashed()->where('is_admin', 0)->get();

//     return $post;
// });

// Route::get('/restore', function () {

//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Route::get('/force-delete', function () {

//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
 */

// // One to One relationship
// Route::get('/user/{id}/post', function ($id) {
//     return User::find($id)->post->content;
// });

// Route::get('/post/{id}/user', function ($id) {
//     return Post::find($id)->user->name;
// });

// Route::get('/posts', function () {
//     $user = User::find(1);

//     foreach ($user->posts as $post) {
//         echo $post->title . '<br>';
//     }
// });

// Many to Many relationship
/*
Route::get('/user/{id}/role', function ($id) {
$user = User::find($id)->roles()->orderBy('id', 'desc')->get();

return $user;

foreach ($user->roles as $role) {
return $role->name;
}
});

Route::get('/roles', function () {
return Role::all();
});*/

// Accessing the intermediate table / pivot
/*Route::get('/user/pivot', function () {

$user = User::find(1);

foreach ($user->roles as $role) {
return $role->pivot->created_at;
}
});

Route::get('/user/country', function () {

$country = Country::find(1);
//$country = Country::find(4);

foreach ($country->posts as $post) {
echo $post->title;
}
});*/

// Polymorphic Relations
/*Route::get('/user/photos', function () {
$user = User::find(1);

foreach ($user->photos as $photo) {
return $photo;
}
});

Route::get('/post/{id}/photos', function ($id) {
$post = Post::find($id);

foreach ($post->photos as $photo) {
echo $photo->path . "<br>";
}
});

Route::get('/photo/{id}/post', function ($id) {
$photo = Photo::findOrFail($id);

return $photo->imageable;
});*/

// Polymorphic Many to Many

/*
Route::get('/post/tag', function () {
$post = Post::find(1);

foreach ($post->tags as $tag) {
return $tag->name;
}
});

Route::get('/tag/{id}/post', function ($id) {
$tag = Tag::find($id);

foreach ($tag->posts as $post) {
echo $post->title;
}
});*/

/*
|--------------------------------------------------------------------------
| Crus App
|--------------------------------------------------------------------------
|
|
 */

Route::resource('posts', 'PostsController');
/* 5.2.29 you need to specify middleware, on 5.2.31 onwards you do not need to
Route::group(['middleware' => 'web'], function () {
Route::resource('posts', 'PostsController');
});
 */

Route::get('dates', function () {
    $date = new DateTime('+1 week');

    echo $date->format('m-d-Y');

    echo '<br>';

    echo Carbon::now()->addDays(10)->diffForHumans();

    echo '<br>';

    echo Carbon::now()->subMonths(5)->diffForHumans();

    echo '<br>';

    echo Carbon::now()->yesterday()->diffForHumans();

    echo '<br>';

    echo Carbon::now()->yesterday();
});

Route::get('getname', function () {
    $user = User::find(1);

    echo $user->name;
});

Route::get('setname', function () {
    $user = User::find(1);

    $user->name = "lucas kovacs";
    $user->save();
});
