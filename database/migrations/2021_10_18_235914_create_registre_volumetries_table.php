<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistreVolumetriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registre_volumetries', function (Blueprint $table) {
            $table->integer('id_volum');
            $table->float('vol_edta',8,2);
            $table->float('con_std1', 8, 2);
            $table->float('con_std2',8,2);
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
        Schema::dropIfExists('registre_volumetries');
    }
}
