<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_demanda_id');
            $table->string('tipo', 50); // 'carga' ou 'descarga'
            $table->string('rua', 255);
            $table->string('cidade', 255);
            $table->string('regiao', 255)->nullable();
            $table->string('codigo_postal', 20)->nullable();
            $table->string('pais', 100)->default('Portugal');
            $table->string('complemento', 255)->nullable();
            $table->timestamps();

            $table->foreign('cliente_demanda_id')->references('id')->on('clientes_demandas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
