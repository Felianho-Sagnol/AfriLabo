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
            $table->string('demand_id');
            $table->string('reference_labo');
            $table->text('elements_d_analyse');
            $table->unsignedBigInteger('hum_id');
            // $table->foreign('hum_id')->references('id')->on('registre_humidites');
            $table->integer('id_densite');
            $table->integer('id_volum');
            $table->integer('id_pf');
            $table->float('masse_pc', 8, 2);
            $table->float('vol_pc',8,2);
            $table->integer('pc')->default(0);
            $table->integer('pm')->default(0);
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
