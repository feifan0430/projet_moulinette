<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->integer('ID_NOTANT');
            $table->integer('ID_NOTE');
            $table->integer('PARTICIPATION');
            $table->integer('ENGAGEMENT');
            $table->integer('TRAVAIL_EN_EQUIPE');
            $table->integer('EXPERTISE');
            $table->primary(['ID_NOTANT', 'ID_NOTE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note');
    }
}
