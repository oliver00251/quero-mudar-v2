<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados (opcional, se o nome for diferente de 'veiculos')
    protected $table = 'veiculos';

    // Campos que podem ser preenchidos (fillable)
    protected $fillable = [
        'marca',
        'modelo',
        'ano_fabricacao',
        'placa',
        'tipo',
        'status'
    ];

    // Se você quiser usar datas para status, etc.
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
