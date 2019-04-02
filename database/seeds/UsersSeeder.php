<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
        	'name' => 'Charles Licup',
        	'email' => 'hello@gmail.com',
        	'password' => bcrypt('coops'),
        ]);

        $user2 = User::create([
            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'password' => bcrypt('coops'),
        ]);

        $ops = DB::table('roles')->insert([
            'name' => 'Operations', 
            'slug' => 'operations',
        ]);

        $sales_manager = DB::table('roles')->insert([
            'name' => 'Sales Manager', 
            'slug' => 'sales_manager',
        ]);

        $sales_employee = DB::table('roles')->insert([
            'name' => 'Sales Employee', 
            'slug' => 'sales_employee',
        ]);

        $management = DB::table('roles')->insert([
            'name' => 'Management', 
            'slug' => 'management',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 1,
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 2,
        ]);

        DB::table('permissions')->insert([
            'name' => 'ABC',
            'slug' => 'abc',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 2,
        ]);
    }
}
