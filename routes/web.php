<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = Post::all();
    return view("posts", [
        'posts' => $posts
    ]);
});


Route::get('posts/{post} ', function ($slug) {
    // Find a post by its slug and pass it to a view called post.

    $post = Post::findOrFail($slug);
    return view('post', ['post' => $post]);

    // return view('post', [
    //     'post' => $post
    // ]);
})->where('post', '[A-z_\-]+');
