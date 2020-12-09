<?php

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

use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {
    $user = User::findOrFail(1);
    $user->posts()->create([
        'title' => 'My First Post',
        'body' => 'I love Laravel with Chester Kyles'
    ]);
});

Route::get('/read', function() {
    $user = User::findOrFail(1);
    foreach ($user->posts as $post) {
        echo $post->title . '</br>' . $post->body;
    }
});

Route::get('/update', function() {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->update([
        'title' => 'Updated Post',
        'body' => 'Awesome Project :D'
    ]);
});

Route::get('/delete', function() {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->delete();
});
