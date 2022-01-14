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
            $table->integer('ID_NOTE', 11);
            $table->float('PARTICIPATION', 5);
            $table->float('ENGAGEMENT', 5);
            $table->float('TRAVAIL_EN_EQUIPE', 5);
            $table->float('EXPERTISE', 5);
            $table->float('SUM', 5);
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
