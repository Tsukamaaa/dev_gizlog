<?php

use Faker\Generator as Faker;
use App\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'slack_user_id' => str_random(9),
        'email' => $faker->safeEmail(),
        'avatar' => null
    ];
});
