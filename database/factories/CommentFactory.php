<?php

use Faker\Generator as Faker;
use App\Models\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 30),
        'question_id' => $faker->numberBetween(1, 100),
        'comment' => $faker->realText(30),
    ];
});
