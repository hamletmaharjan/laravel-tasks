<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'hamlet maharjan',
            'email' => 'hams@gmail.com',
            'password' => Hash::make('hamspwd'),
            'role_id' => 1,
        ]);
    }
}
