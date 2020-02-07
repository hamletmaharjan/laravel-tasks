<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'superadmin',
                'description' => 'highest rank',
            ],
            [
                'name' => 'admin',
                'description' => 'assistant to the superadmin',
            ],
            [
                'name' => 'superadmin',
                'description' => 'just a user',
            ]
            
        ]);
    }
}
