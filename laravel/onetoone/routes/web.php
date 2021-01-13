<?php

use App\Address;
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

Route::get('/insert', function () {
    $user = User::findOrFail(1);

    $address = new Address(['name' => '4435 Paulina av NY NY 11218']);

    $user->address()->save($address);
});

Route::get('/update/user/{id}/address/{aid}', function ($id, $aid) {
    $address = Address::where([
        'user_id' => $id,
        'id' => $aid,
    ])->first();

    $address->name = "4353 Update Av, Alaska";

    $address->save();
});

Route::get('/delete/{id}', function ($id) {
    $user = User::findOrFail($id);

    $user->address()->delete();

    return "done";
});
