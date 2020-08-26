<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->text(100);

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text(1000)
    ];
});
