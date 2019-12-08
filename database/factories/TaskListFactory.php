<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\User;
use App\Models\TaskList;
use Faker\Generator as Faker;

$factory->define(TaskList::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text(),
        'finished_at' => $faker->dateTimeBetween('now','2 years'),
        'category_id' => Category::all()->random()->first()->id,
        'user_id' => User::all()->random()->first()->id
    ];
});
