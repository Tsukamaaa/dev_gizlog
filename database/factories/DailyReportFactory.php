<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DailyReport::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'reporting_time' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'title' => $faker->name,
        'content' => $faker->realText($maxNbChar = 100, $indexSize = 1)
    ];
});
