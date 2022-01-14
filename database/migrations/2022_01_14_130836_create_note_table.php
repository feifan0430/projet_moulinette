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
            $table->integer('ID_NOTANT', 11);
            $table->integer('ID_NOTE', 11);
            $table->integer('PARTICIPATION', 11);
            $table->integer('ENGAGEMENT', 11);
            $table->integer('TRAVAIL_EN_EQUIPE', 11);
            $table->integer('EXPERTISE', 11);
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
