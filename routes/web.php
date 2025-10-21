<?php

use App\Models\Category;
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

Route::get('/posts/author/{user:username}', function (User $user) {

    return view('posts', ['posts' => $user->posts, 'title' => count($user->posts).' article by '.$user->name]);
});

Route::get('/posts/category/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'title' => count($category->posts).' article in the '.strtolower(substr($category->name, 0, -1)).' category',
    ]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
