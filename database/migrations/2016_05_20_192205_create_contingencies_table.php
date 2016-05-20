<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContingenciesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contingencies', function(Blueprint $table) {
            $table->integer('issuer_id')->unsigned();
            $table->foreign('issuer_id')->references('id')->on('issuers');
            $table->string('tipo', 10);
            $table->string('motivo');
            $table->dateTime('hora');
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
        Schema::drop('contingencies');
    }
}
