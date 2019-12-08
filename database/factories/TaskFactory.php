<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Task;
use App\Models\TaskList;

use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text(),
        'state'=> $faker->randomElement([
            Task::UNSTARTED,
            Task::STARTED,
            Task::IN_PROGRESS,
            Task::COMPLETE,
            Task::IGNORED]),
        'taskList_id' => TaskList::all()->random()->first()->id
    ];
});
