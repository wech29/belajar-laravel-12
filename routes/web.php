<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {

    $posts = Post::all();

    return view('posts', ['posts' => $posts]);

});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', ['blog' => $post]);
});


Route::get('/posts/author/{user}', function (User $user) {

    return view('posts', ['posts' => $user->posts, 'title' => 'Article by.'. $user->name]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
