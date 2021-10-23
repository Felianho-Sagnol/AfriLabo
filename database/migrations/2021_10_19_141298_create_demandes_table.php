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

        Schema::table('demandes', function($table)
        {
            //les cles etrangeres...
            $table->string('receptor_id');
            $table->foreign('receptor_id')
                        ->references('matricule')
                        ->on('employes')
                        ->onDelete('cascade')
                        ;
            $table->string('pm_id')->nullable();
            $table->foreign('pm_id')
                        ->references('matricule')
                        ->on('employes')
                        ->onDelete('cascade')
                        ;
            $table->string('pc_id')->nullable();
            $table->foreign('pc_id')
                        ->references('matricule')
                        ->on('employes')
                        ->onDelete('cascade')
                        ;
            $table->unsignedBigInteger('aa_id')->nullable();
            $table->foreign('aa_id')
                        ->references('aa_id')
                        ->on('aas')
                        ->onDelete('cascade')
                        ->default(NULL); 

            $table->unsignedBigInteger('icp_id')->nullable();
            $table->foreign('icp_id')
                        ->references('icp_id')
                        ->on('icps')
                        ->onDelete('cascade')
                        ;

            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        // $table->dropForeign('employe_id');
        // $table->dropForeign('aa_id');
        // $table->dropForeign('icp_id');
        Schema::drop('employes');
        Schema::dropIfExists('demandes');
    }
}
