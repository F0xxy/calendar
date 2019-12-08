<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use App\Models\Group;
use App\User;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text(),
        'category_id' => Category::all()->random()->first()->id,
        'user_id' => User::all()->random()->first()->id
    ];
});
