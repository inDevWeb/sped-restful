<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(UsersTableSeeder::class);
        $this->call(IssuersTableSeeder::class);
        $this->call(OAuthClientsTableSeeder::class);
        $this->call(IssuersMembersTableSeeder::class);
        
        Model::reguard();
    }
}
