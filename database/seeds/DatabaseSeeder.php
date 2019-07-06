<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserDatabaseSeeder::class);
    }
}

class UserDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            array(  'username'  =>'cuong7',
                    'password'  =>Hash::make('123456'),
                    'email'     =>'cuong7@gmail.com',
                    'level'     =>1 )
        ]);
    }
}

