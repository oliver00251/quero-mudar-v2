<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        FacadesDB::table('categorias')->insert([
            ['nome' => 'Alimentação'],
            ['nome' => 'Transporte'],
            ['nome' => 'Saúde'],
            ['nome' => 'Lazer'],
            ['nome' => 'Educação'],
        ]);
    }
}
