<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuditoriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha');
            $table->string('lugar');
            $table->unsignedInteger('auditor_lider_id');//Foranea auditores
            $table->string('objetivos', 3000);
            $table->string('alcances', 3000);
            $table->string('criterios', 3000);
            $table->string('observaciones', 3000);
            $table->timestamps();
            $table->softDeletes();

            //Relación auditores
            $table->foreign('auditor_lider_id')->references('id')->on('auditores')
                ->onUpdate('cascade')->onDelete('cascade');
        });


        // Many-to-Many entre auditores internos y auditorías
        Schema::create('auditorias_auditores', function (Blueprint $table) {
            $table->unsignedInteger('auditoria_id');
            $table->unsignedInteger('auditor_id');

            $table->foreign('auditoria_id')->references('id')->on('auditorias')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('auditor_id')->references('id')->on('auditores')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['auditoria_id', 'auditor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditorias_auditores');
        Schema::dropIfExists('auditorias');
    }
}
