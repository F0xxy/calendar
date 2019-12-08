<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Tag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text(),

        'user_id' => User::all()->random()->first()->id
    ];
});
