<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Post extends Model
{
    // jika ingin menggunakan fitur factory
    use HasFactory;

    // agar bisa diisi secara massal
    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'category_id',
        'body',
    ];

    // untuk eager loading secara otomatis setiap memanggil model Post
    protected $with = ['author', 'category'];



    // sebelum extend Model  (karena sudah ada di database jadi tidak perlu / akan menghasilkan error)

    // public static function all()     (error karena nama method all sudah ada di Model)
    // {
    //     return [
    //         [
    //             'id' => 1,
    //             'title' => 'Judul Artikel 1',
    //             'slug' => 'judul-artikel-1',
    //             'author' => 'Najma',
    //             'date' => '29 April 2025',
    //             'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia,
    //             recusandae! Voluptate assumenda quia
    //             veniam? Enim quis quas voluptatum error aperiam distinctio aliquid optio vero quisquam qui tenetur magni sit
    //             doloremque debitis illo nulla atque consectetur tempore, molestiae reprehenderit provident consequuntur,
    //             vitae fugiat. In et corporis illo repellendus quia illum excepturi?',
    //         ],
    //         [
    //             'id' => 2,
    //             'title' => 'Judul Artikel 2',
    //             'slug' => 'judul-artikel-2',
    //             'author' => 'Khairunnisa',
    //             'date' => '7 November 2025',
    //             'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt,
    //             possimus culpa! Asperiores autem quia est? Ipsum asperiores quis architecto laboriosam voluptatibus iusto
    //             molestias quos soluta veritatis consequuntur quod possimus labore sint, vel culpa dolorum eligendi fugiat
    //             sapiente a at. Dignissimos sit voluptatibus quos doloremque facilis voluptate quam eos excepturi soluta.',
    //         ],
    //     ];
    // }

    // public static function find($slug)       (termasuk ini akan error karena nama method find sudah ada di Model)
    // {

    //     // return Arr::first(static::all(), function ($post) use ($slug) {
    //     //     return $post['slug'] === $slug;
    //     // });

    //     // arrow fn
    //     return Arr::first(self::all(), fn ($post) => $post['slug'] === $slug) ?? abort(404);
    // }


    // setelah extend Model

    // protected $table = 'blog_posts';  (solusi jika nama table tidak sesuai dengan nama plural dari nama model, maka perlu didefinisikan secara eksplisit)

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
