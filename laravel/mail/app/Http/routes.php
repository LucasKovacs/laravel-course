<?php

use Illuminate\Support\Facades\Mail;

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
    $data = [
        'title' => 'When are you coming back?',
        'content' => 'I was in your neighborhood last night and I could not find my way back',
    ];

    Mail::send('emails.test', $data, function ($message) {
        $message->from('lucas.kovacs@gmail.com', 'Lucas Kovács');
        $message->sender('lucas.kovacs@gmail.com', 'Lucas Kovács');
        $message->to('lucas.kovacs@gmail.com', 'Lucas Kovács');
        //$message->cc('lucas.kovacs@gmail.com', 'Lucas Kovács');
        //$message->bcc('lucas.kovacs@gmail.com', 'Lucas Kovács');
        $message->replyTo('lucas.kovacs@gmail.com', 'Lucas Kovács');
        $message->subject('Hi, what\'s up');
        $message->priority(3);
        //$message->attach('pathToFile');
    });
});
