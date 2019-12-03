<?php

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

    }
}
