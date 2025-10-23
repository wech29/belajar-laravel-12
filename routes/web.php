<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {

    // $posts = Post::all();                                                                                                    ~> lazy loading
    $posts = Post::with(['author', 'category'])->latest()
    ->filter(request(['search','category', 'author']))->paginate(6)->withQueryString();      // ~> eager loading
    return view('posts', ['posts' => $posts]);
});

Route::get('/posts/{posts:slug}', function (Post $posts) {
    return view('post', ['blog' => $posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
