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
            $table->string('reference_labo')->unique();
            $table->text('elements_d_analyse');
            $table->float('masse_pc', 8, 2)->default(0);
            $table->float('vol_pc',8,2)->default(0);
            $table->integer('pc')->default(0);
            $table->integer('pm')->default(0);
            

                                             
            $table->dateTime('created_at');
            Schema::enableForeignKeyConstraints();
        });

        
        Schema::table('echantillons', function($table)
        {
            $table->string('demande_id');
            $table->foreign('demande_id')
                        ->references('demande_id')
                        ->on('demandes')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->unsignedBigInteger('densite_id')->nullable();
            $table->foreign('densite_id')
                        ->references('densite_id')
                        ->on('densites')
                        ->onDelete('cascade')
                        ->onUpdate('cascade')
                        ->nullable(); 
                        
            $table->unsignedBigInteger('pertefeu_id')->nullable();
            $table->foreign('pertefeu_id')
                        ->references('pertefeu_id')
                        ->on('pertefeus')
                        ->onDelete('cascade')
                        ->onUpdate('cascade')
                        ->nullable() ;  
                             
            $table->unsignedBigInteger('humidite_id')->nullable();
            $table->foreign('humidite_id')
                        ->references('humidite_id')
                        ->on('humidites')
                        ->onDelete('cascade')
                        ->onUpdate('cascade'); 

            $table->unsignedBigInteger('volumetrie_id')->nullable();
            $table->foreign('volumetrie_id')
                        ->references('volumetrie_id')
                        ->on('volumetries')
                        ->onDelete('cascade')
                        ->onUpdate('cascade')
                       ; 
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
        // $table->dropForeign('demande_id');
        // $table->dropForeign('pertefeu_id');
        // $table->dropForeign('densite_id');
        // $table->dropForeign('humidite_id');
        // $table->dropForeign('volumetrie_id');
        Schema::dropIfExists('echantillons');
    }
}
