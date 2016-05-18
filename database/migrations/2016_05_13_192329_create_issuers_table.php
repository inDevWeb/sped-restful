<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fantasia', 25)->unique();
            $table->string('razao');
            $table->string('logradouro');
            $table->string('numero', 50);
            $table->string('complemento');
            $table->string('municipio');
            $table->string('UF', 2);
            $table->string('cep', 20);
            $table->text('logo');
            $table->string('cnpj', 14)->unique();
            $table->string('ie', 20);
            $table->string('im', 20);
            $table->string('CNAE', 20);
            $table->string('CSC', 100);
            $table->string('CSC_id', 100);
            $table->string('IBPT', 100);
            $table->string('email');
            $table->string('pass', 20);
            $table->string('smtp');
            $table->string('port', 20);
            $table->string('ssl', 10);
            $table->string('fromname');
            $table->string('replyto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issuers');
    }
}
