<?php

use Illuminate\Database\Seeder;
use SpedRest\Entities\OAuthClient;

class OAuthClientsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 'angular',
            'secret' => 'segredo',
            'name' => 'AngularJS FrontEnd'
        ];
        OAuthClient::create($data);
    }
}
