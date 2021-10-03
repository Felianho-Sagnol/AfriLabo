<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('demand_id');
            $table->string('recepteur_id');
            $table->string('society');
            $table->string('identification_echantillon');
            $table->string('demandeur');
            $table->string('etat');
            $table->string('etat_solid')->nullable();
            $table->string('echantillonnage');
            $table->string('depot')->nullable();
            $table->string('nombre_echantillons');
            $table->string('Emplacement');
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
        Schema::dropIfExists('demandes');
    }
}
