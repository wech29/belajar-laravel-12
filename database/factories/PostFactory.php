<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(5, 8));
        return [
            'title' => $title,
            // 'slug' => $this->faker->slug(),                              ~> cara biasa
            'slug' => Str::slug($title),
            // 'author_id' => $this->faker->name(),                         ~> jika tidak menggunakan relasi
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'body' => $this->faker->paragraphs(4, true),
        ];
    }




    // NOTES

    // contoh penggunaan recycle untuk relasi many to one (digunakan di seeder / tinker)
    // App\Models\Post::factory(50)->recycle(User::factory(5)->create())->create();


    // $user = App\Models\User::first();                            ~> mengambil user pertama
    // $user->posts->count();                                       ~> menghitung jumlah post milik user pertama


    // $post = App\Models\Post::first();                            ~> mengambil post pertama
    // $post->author;                                               ~> mengambil author dari post pertama


    // jika ingin memnambahkan 2 sekaligus
    // App\Models\Post::factory(30)->recycle([Category::factory(3)->create(), User::factory(5)->create()])->create()





}
