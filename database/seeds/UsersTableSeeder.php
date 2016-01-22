<?php

use Illuminate\Database\Seeder;

use ShareApp\User;
use ShareApp\Role;
use ShareApp\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dwi Prabowo',
            'email' => 'dwijpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'remember_token' => str_random(10),
            'gender' => 1,
        ]);
        Role::create([
            'name' => 'admin',
            'label' => 'The admin of the system',
        ]);
        Permission::create([
            'name' => 'dashboard',
            'label' => 'User has right to access admin dashboard',
        ]);

        Role::whereName('admin')->first()->assign(
            Permission::whereName('dashboard')->first()
        );
        User::whereEmail('dwijpr@gmail.com')->first()->assign(
            Role::whereName('admin')->first()
        );

        User::create([
            'name' => 'Owl Jpr',
            'email' => 'owljpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'remember_token' => str_random(10),
            'gender' => 1,
        ]);

        for($i = 0;$i < 10;$i++){
            factory(User::class)->create();
        }
    }
}
