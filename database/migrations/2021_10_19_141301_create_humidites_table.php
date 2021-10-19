<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumiditesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humidites', function (Blueprint $table) {
            $table->unsignedBigInteger('humidite_id')->unique();
            $table->float('poids_tar',8,2);
            $table->float('poids_humid',8,2);
            $table->float('poids_seche', 8, 2);
            $table->float('poids', 8, 2);
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
        Schema::dropIfExists('humidites');
    }
}
