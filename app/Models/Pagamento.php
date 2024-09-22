<?php

// app/Models/Pagamento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['descricao', 'valor', 'data', 'metodo', 'fornecedor_id', 'transacao_id'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
    
    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function transacao()
    {
        return $this->belongsTo(Transacao::class, 'transacao_id');
    }
}
