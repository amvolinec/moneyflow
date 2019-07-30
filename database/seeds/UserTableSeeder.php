<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'teamleader')->first();
		$role_user  = Role::where('name', 'agent')->first();
		
		$user = new User();
		$user->name = 'Teamleader';
		$user->email = 'teamleader@gmail.com';
		$user->password = bcrypt('secret');
		$user->save();
		$user->roles()->attach($role_admin);
				
		$user = new User();
		$user->name = 'Agent';
		$user->email = 'agent@gmail.com';
		$user->password = bcrypt('secret');
		$user->save();
		$user->roles()->attach($role_user);
    }
}
