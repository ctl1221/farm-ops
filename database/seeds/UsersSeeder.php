<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{

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

        $admin = DB::table('roles')->insert([
            'name' => 'Administrator', 
            'slug' => 'admin',
        ]);

        $ops_encoder = Role::create([
            'name' => 'Operations Encoder',
            'slug' => 'ops_encoder',
        ]);

        $sales_encoder = Role::create([
            'name' => 'Sales Encoder',
            'slug' => 'sales_encoder',
        ]);

        $sales_record_view = Permission::create([
            'name' => 'View Sales Records',
            'slug' => 'sales_record.view',
        ]);

        $sales_record_create = Permission::create([
            'name' => 'Create Sales Records',
            'slug' => 'sales_record.create',
        ]);

        $sales_encoder->permissions()->attach($sales_record_view);
        $sales_encoder->permissions()->attach($sales_record_create);

        $user1->roles()->attach($sales_encoder);
        $user2->roles()->attach($ops_encoder);

        
    }
}
