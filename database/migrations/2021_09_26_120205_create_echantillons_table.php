<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchantillonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echantillons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->string('reference_labo');
            $table->string('reference_labo');
            $table->string('elements_d_analyse');
            $table->int('etat');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echantillons');
    }
}
