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
        Schema::create('clientes_demandas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->string('nome_cliente', 255);
            $table->string('telefone', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->timestamps();
            
            $table->index('data');
            $table->index('nome_cliente');
            $table->index('telefone');
        });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_demandas');
    }
};
