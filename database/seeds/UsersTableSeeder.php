<?php

use Illuminate\Database\Seeder;
use SpedRest\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(\SpedRest\Entities\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('senha'),
            'cnpj' => '',
            'remember_token' => str_random(10)
        ]);
        
        factory(User::class, 5)->create();
    }
}
