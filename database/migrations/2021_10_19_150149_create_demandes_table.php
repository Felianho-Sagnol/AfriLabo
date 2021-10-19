<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('demande_id')->unique();
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


        Schema::create('demandes', function (Blueprint $table) {
            
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBigInteger('recepteur_id');
            $table->foreign('recepteur_id')
                        ->references('recepteur_id')
                        ->on('recepteurs')
                        ->onDelete('cascade')
                        ->onUpdate('cascade'); 
         });
        Schema::table('demandes', function($table)
        {
            //les cles etrangeres...
     

            $table->foreign('aa_id')
                        ->references('aa_id')
                        ->on('aas')
                        ->onDelete('cascade')
                        ->onUpdate('cascade'); 
                        
            $table->foreign('icp_id')
                        ->references('icp_id')
                        ->on('aas')
                        ->onDelete('cascade')
                        ->onUpdate('cascade'); 
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
