<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = App\Models\User::first();                            ~> mengambil user pertama
        // $user->posts->count();                                       ~> menghitung jumlah post milik user pertama

        // $post = App\Models\Post::first();                            ~> mengambil post pertama
        // $post->author;                                               ~> mengambil author dari post pertama

        // contoh penggunaan recycle untuk relasi many to one (digunakan di seeder / tinker)
        // App\Models\Post::factory(50)->recycle(User::factory(5)->create())->create();

        // jika ingin menambahkan 2 recycle sekaligus
        // Post::factory(30)->recycle([Category::factory(3)->create(),User::factory(5)->create()])->create();           ~> jika menggunakan factory
        Post::factory(30)->recycle([Category::all(), User::factory(5)->create()])->create();                             // jika menggunakan seeder
    }
}
