<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuditoriaProcesosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedInteger('proceso_id');
            $table->unsignedInteger('auditoria_id');
            $table->unsignedInteger('auditor_id');
            $table->enum('estado', ['PENDIENTE', 'CUMPLIDA', 'REPROGRAMADA', 'APLAZADA'])->default('PENDIENTE');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proceso_id')->references('id')->on('procesos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('auditoria_id')->references('id')->on('auditorias')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('auditor_id')->references('id')->on('auditores')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('auditoria_procesos');
    }
}
