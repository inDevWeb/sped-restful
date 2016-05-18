<?php

use Illuminate\Database\Seeder;
use SpedRest\Entities\Issuer;

class IssuersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Issuer::truncate();
        factory(Issuer::class)->create([
            'fantasia' => 'FIMATEC',
            'razao' => 'FIMATEC TEXTIL LTDA',
            'logradouro' => 'RUA DOS PATRIOTAS',
            'numero' => '897' ,
            'complemento' => 'ARMAZEM 42',
            'municipio' => 'Sao Paulo',
            'UF' => 'SP',
            'cep' => '04207040',
            'logo' => '',
            'cnpj' => '58716523000119',
            'ie' => '112006603110',
            'im' => '95095870',
            'CNAE' => '',
            'CSC' => '',
            'CSC_id' => '',
            'IBPT' => '',
            'email' => 'roberto@fimatec.com.br',
            'pass' => 'Q!w2e3R$',
            'smtp' => 'email-ssl.com.br',
            'port' => '465',
            'ssl' => 'ssl',
            'fromname' => 'Fimatec',
            'replyto' => 'nfe@fimatec.com.br',
        ]);
        
        factory(Issuer::class, 5)->create();
    }
}
