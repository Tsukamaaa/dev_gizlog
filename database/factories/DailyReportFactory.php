<?php

use Faker\Generator as Faker;
use App\Models\DailyReport;

$factory->define(DailyReport::class, function (Faker $faker) {
    return [
        'user_id'           => $faker->numberBetween(1, 5),
        'reporting_time'    => $faker->dateTime('now', date_default_timezone_get()),
        'title'             => $faker->name,
        'content'           => $faker->realText(100, 1)
    ];
});
