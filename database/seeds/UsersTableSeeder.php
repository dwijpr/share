<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permission;

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
    }
}
