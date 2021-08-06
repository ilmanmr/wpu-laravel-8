<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [[
        'title' => "Judul Post Pertama",
        'slug' => 'judul-post-pertama',
        'author' => 'Ilman Manbaullum Ramdhan',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo soluta ipsam nobis excepturi unde explicabo aliquid minima temporibus! Ea, labore, praesentium ad ducimus dolor, fugiat maiores facere maxime quod nihil sint. Tempore perferendis laborum a fuga necessitatibus architecto fugit magni molestias magnam porro ex officia excepturi dolore impedit voluptatibus rem quasi ducimus consequatur debitis, odit natus, voluptas numquam assumenda. Quisquam delectus ratione quia quis mollitia, odit est iusto earum soluta libero ullam nostrum nemo ex harum repellat nisi quibusdam natus?'
    ], [
        'title' => "Judul Post Kedua",
        'slug' => 'judul-post-kedua',
        'author' => 'Ilman Manbaullum Ramdhan',
        'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis veritatis vel dignissimos magnam ipsa nostrum! Unde culpa tempora nulla porro, nesciunt magni repellat rem. Commodi illo praesentium consequuntur rerum in! Quas, sequi perferendis obcaecati voluptas fugiat architecto dolores corporis aperiam aliquam voluptatum, qui inventore quidem quae earum ullam repudiandae in maxime, excepturi cum. Error repellendus expedita nesciunt natus cum provident illo beatae laboriosam consectetur, commodi, mollitia temporibus nihil! Dignissimos iusto vel, itaque suscipit assumenda cumque recusandae explicabo porro repellat. Id fuga sit pariatur ut cum delectus deserunt saepe ad aliquam earum, numquam, rerum assumenda voluptatem quibusdam, debitis porro atque eius!'
    ]];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
