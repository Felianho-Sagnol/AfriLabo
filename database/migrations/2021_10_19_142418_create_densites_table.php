<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDensitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('densites', function (Blueprint $table) {
            $table->unsignedBigInteger('densite_id')->unique();
            $table->float('masse_creuse',8,2);
            $table->float('masse_initiale',8,2);
            $table->float('vol_initial', 8, 2);
            $table->float('masse_2h', 8, 2);
            $table->float('temperature',8,2);
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
        Schema::dropIfExists('densites');
    }
}
