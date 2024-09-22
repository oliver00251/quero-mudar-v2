<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaContas extends Migration
{
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ['bancária', 'caixa']);
            $table->decimal('saldo', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
