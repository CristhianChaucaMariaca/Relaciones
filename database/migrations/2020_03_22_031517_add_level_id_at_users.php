<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Metodo para modificar la tabla usuarios */
        Schema::table('users', function(Blueprint $table){
            
            /* Creamos la nueva columna */
            $table->bigInteger('level_id')->unsigned()->nullable()->after('id');

            $table->foreign('level_id')->references('id')->on('levels')
                /* Asignamos valores nulos con SET NULL a los USUARIOS si se borra un NIVEL */
                ->onDelete('set null')
                ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
