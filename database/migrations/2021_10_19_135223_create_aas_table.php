<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aas', function (Blueprint $table) {
            $table->unsignedBigInteger('aa_id');
            $table->float('lecture',8,2);
            $table->float('vid',8,2);
            $table->float('pd',8,2);

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
        Schema::dropIfExists('aas');
    }
}
