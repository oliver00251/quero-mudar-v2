<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPagamentos extends Migration
{
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->decimal('valor', 10, 2);
            $table->date('data');
            $table->string('tipo',2);
            $table->string('veiculo')->nullable();
            $table->string('qtd_horas')->nullable();
            $table->string('vlr_hora')->nullable();
            $table->string('qtd_ajudante')->nullable();
            $table->string('descricao')->nullable();
            $table->string('metodo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}