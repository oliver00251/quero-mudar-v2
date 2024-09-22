<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaTransacoes extends Migration
{
    public function up()
    {
        Schema::dropIfExists('transacoes');
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->nullable();
            $table->decimal('valor', 10, 2);
            $table->date('data');
            $table->enum('tipo', ['receita', 'despesa']);
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('conta_id')->constrained('contas')->onDelete('cascade');
            $table->foreignId('usuario_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
