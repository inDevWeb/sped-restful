<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(SpedRest\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(SpedRest\Entities\Issuer::class, function (Faker\Generator $faker) {
    $co = $faker->company;
    $cos = $co . $faker->companySuffix;
    return [
        'fantasia' => $co,
        'razao' => $cos,
        'logradouro' => $faker->streetName,
        'numero' => $faker->numberBetween(1, 6000),
        'complemento' => '',
        'municipio' => $faker->city,
        'UF' => 'SP',
        'cep' => $faker->numerify('#####-###'),
        'logo' => '',
        'cnpj' => $faker->numerify('#############'),
        'ie' => $faker->numerify('#############'),
        'im' => '',
        'CNAE' => '',
        'CSC' => '',
        'CSC_id' => '',
        'IBPT' => '',
        'email' => $faker->companyEmail,
        'pass' => '',
        'smtp' => '',
        'port' => '',
        'ssl' => '',
        'fromname' => '',
        'replyto' => ''
    ];
});

$factory->define(SpedRest\Entities\IssuerMember::class, function (Faker\Generator $faker) {
    return [
        'issuer_id' => $faker->numberBetween(1, 6000),
        'member_id' => $faker->numberBetween(1, 6000)
    ];
});
