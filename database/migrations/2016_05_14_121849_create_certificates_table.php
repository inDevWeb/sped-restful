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
            $table->text('pfx');
            $table->text('chain');
            $table->string('secret');
            $table->string('cnpj');
            $table->dateTime('validity');
            $table->timestamps();
            $table->foreign('issuer_id')->references('id')->on('issuers')->onDelete('cascade');
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
