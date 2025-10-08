<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {

    $posts = Post::all();

    return view('posts', ['blogs' => $posts]);

});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', ['blogs' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
