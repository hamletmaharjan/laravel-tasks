<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'slug' => 'view-users',
                'name' => 'view users',
            ],
            [
                'slug' => 'create-user',
                'name' => 'create user',
            ],
            [
                'slug' => 'show user',
                'name' => 'show user',
            ]
            
        ]);
    }
}
