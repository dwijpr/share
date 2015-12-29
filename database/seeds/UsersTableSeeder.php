<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'Dwi Prabowo',
            'email' => 'dwijpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        $role = DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'The admin of the system',
        ]);
        User::find(1)->assign(Role::whereName('admin')->first());
        $user = DB::table('users')->insert([
            'name' => 'Owl Jpr',
            'email' => 'owljpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
    }
}
