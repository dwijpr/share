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
        DB::table('users')->insert([
            'name' => 'Dwi Prabowo',
            'email' => 'dwijpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'The admin of the system',
        ]);
        DB::table('permissions')->insert([
            'name' => 'dashboard',
            'label' => 'User has right to access admin dashboard',
        ]);

        Role::whereName('admin')->first()->assign(
            Permission::whereName('dashboard')->first()
        );
        User::whereEmail('dwijpr@gmail.com')->first()->assign(
            Role::whereName('admin')->first()
        );

        DB::table('users')->insert([
            'name' => 'Owl Jpr',
            'email' => 'owljpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);

        for($i = 0;$i < 10;$i++){
            factory(User::class)->create();
        }
    }
}
