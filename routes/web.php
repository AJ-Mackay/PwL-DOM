<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

    // $post = new Post(['title'=>'My first post', 'body'=>'I love Laravel']);
    // $user->posts()->save($post);
    // these two lines can be shortend to:
    $user->posts()->save(new Post(['title'=>'My first post', 'body'=>'I love Laravel']));
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
});