<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrePerteFeusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registre_perte_feus', function (Blueprint $table) {
            $table->integer('id_pf');
            $table->float('masse_creuse',8,2);
            $table->float('masse_initiale',8,2);
            $table->float('vol_initial', 8, 2);
            $table->float('masse_2h', 8, 2);
            $table->float('temperature',8,2);
            $table->float('pf_mo',8,2);
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
        Schema::dropIfExists('registre_perte_feus');
    }
}
