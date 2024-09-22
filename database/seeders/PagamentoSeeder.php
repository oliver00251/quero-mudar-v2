<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class PagamentoSeeder extends Seeder
{
    public function run()
    {
        FacadesDB::table('pagamentos')->insert([
            [
                'categoria_id' => 1,
                'valor' => 150.00,
                'data' => Carbon::now()->subDays(10),
                'tipo' => 'D',
                'descricao' => 'Almoço',
                'metodo' => 'Cartão'
            ],
            [
                'categoria_id' => 2,
                'valor' => 50.00,
                'data' => Carbon::now()->subDays(5),
                'tipo' => 'D',
                'descricao' => 'Transporte',
                'metodo' => 'Dinheiro'
            ],
            [
                'categoria_id' => 3,
                'valor' => 200.00,
                'data' => Carbon::now()->subDays(2),
                'tipo' => 'R',
                'descricao' => 'Salário',
                'metodo' => 'Transferência'
            ],
            [
                'categoria_id' => 4,
                'valor' => 80.00,
                'data' => Carbon::now()->subDays(1),
                'tipo' => 'D',
                'descricao' => 'Cinema',
                'metodo' => 'Cartão'
            ],
            [
                'categoria_id' => 5,
                'valor' => 300.00,
                'data' => Carbon::now(),
                'tipo' => 'R',
                'descricao' => 'Venda de produtos',
                'metodo' => 'Dinheiro'
            ],
        ]);
    }
}
