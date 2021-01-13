<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'title' => $faker->sentence,
        'post_image' => 'cat.jpg', //$faker->imageUrl('750', '300'),
        'body' => $faker->paragraph,
    ];
});
