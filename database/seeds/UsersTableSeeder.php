<?php

use App\Models\Event;
use App\Models\Category;
use App\Models\Group;
use App\Models\Tag;
use App\Models\Task;
use App\Models\TaskList;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'name' => 'Amanda',
            'email' => 'amanda@gmail.com',
            'password' => bcrypt('1'),

        ]);
        factory(User::class, 50)->create()->each(function (User $u) {

            factory(Tag::class, 5)->create(['user_id' => $u->id]);
            factory(Category::class, 5)->create(['user_id' => $u->id]);
            $u->groups()->attach(factory(Group::class, 5)->create()->each(function (Group $group) {
                $group->contacts()->attach([User::all()->random()->first()->id,User::all()->random()->first()->id,User::all()->random()->first()->id,]);
                $group->category()->associate(Category::all()->random()->first());
                $group->tags()->attach([Tag::all()->random()->first()->id, Tag::all()->random()->first()->id]);

            }));
            $u->taskLists()->attach(factory(TaskList::class, 5)->make()->each(function (TaskList $list) {

                factory(Task::class, 5)->create(['taskList_id' => $list->id]);
                $list->category()->associate(Category::all()->random()->first());
                $list->tags()->attach([Tag::all()->random()->first()->id, Tag::all()->random()->first()->id]);

            }));

            $u->events()->attach(factory(Event::class, 5)->make()->each(function (Event $event) {

                $event->category()->associate(Category::all()->random()->first());
                $event->tags()->attach([Tag::all()->random()->first()->id, Tag::all()->random()->first()->id]);

            }));

        });

    }
}
