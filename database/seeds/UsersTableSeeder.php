<?php

use Illuminate\Database\Seeder;
//use SpedRest\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SpedRest\Entities\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('senha'),
            'remember_token' => str_random(10)
        ]);
        
        factory(\SpedRest\Entities\User::class, 5)->create();
        
        /*
        User::truncate();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('senha'),
        ]);
         * 
         */
    }
}
