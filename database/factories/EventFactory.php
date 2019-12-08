<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use App\Models\Event;
use App\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $started_at=$faker->dateTimeBetween('now','2 years');
    $finished_at=$faker->dateTimeBetween('$started_at');
    return [
        'name' => $faker->title,
        'description' => $faker->text(),
        'started_at' =>  $started_at,
        'finished_at' =>  $finished_at,
        'category_id' => Category::all()->random()->first()->id,
        'user_id' => User::all()->random()->first()->id
    ];
});
