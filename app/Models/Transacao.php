<?php

// app/Models/Transacao.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $fillable = ['descricao', 'valor', 'data', 'tipo', 'categoria_id', 'conta_id', 'usuario_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'conta_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
