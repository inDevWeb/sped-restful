<?php

use Illuminate\Database\Seeder;

class IssuersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SpedRest\Entities\Issuer::class, 5)->create();
    }
}
