<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_final', function (Blueprint $table) {
            $table->integer('ID_NOTE');
            $table->float('PARTICIPATION');
            $table->float('ENGAGEMENT');
            $table->float('TRAVAIL_EN_EQUIPE');
            $table->float('EXPERTISE');
            $table->float('SUM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_final');
    }
}
