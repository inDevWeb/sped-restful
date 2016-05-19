<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issuer_id')->unsigned();
            $table->foreign('issuer_id')->references('id')->on('issuers');
            $table->text('pfx');
            $table->text('chain');
            $table->string('secret');
            $table->text('prikey');
            $table->text('pubkey');
            $table->text('certkey');
            $table->string('cnpj');
            $table->dateTime('validity');
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
        Schema::drop('certificates');
    }
}
