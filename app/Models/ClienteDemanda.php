<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteDemanda extends Model
{
    use HasFactory;
    protected $table = 'clientes_demandas';

    protected $fillable = [
        'data',
        'nome_cliente',
        'telefone',
        'email'
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'cliente_demanda_id');
    }
}
