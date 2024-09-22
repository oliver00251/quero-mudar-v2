<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = [
        'cliente_demanda_id',
        'tipo',
        'rua',
        'cidade',
        'regiao',
        'codigo_postal',
        'pais',
        'complemento'
    ];

    public function clienteDemanda()
    {
        return $this->belongsTo(ClienteDemanda::class, 'cliente_demanda_id');
    }
}
