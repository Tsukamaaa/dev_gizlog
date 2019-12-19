<?php

use Faker\Generator as Faker;
use App\Models\Question;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'tag_category_id' => $faker->numberBetween(1, 4),
        'title' => $faker->word,
        'content' => $faker->realText(150)
    ];
});
