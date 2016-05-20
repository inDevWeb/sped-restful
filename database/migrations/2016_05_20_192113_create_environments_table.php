<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environments', function(Blueprint $table) {
            $table->integer('issuer_id')->unsigned();
            $table->foreign('issuer_id')->references('id')->on('issuers');
            $table->tinyInteger('tpAmb');
            $table->string('description', 50);
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
        Schema::drop('environments');
    }
}
