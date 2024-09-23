<?php

// app/Models/Pagamento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'categoria_id', // Inclua a categoria_id
        'descricao',
        'valor',
        'data',
        'metodo',
        'veiculo', // Se precisar armazenar informações sobre o veículo
        'qtd_horas',
        'vlr_hora',
        'qtd_ajudante',
        'transacao_id' // Certifique-se de que este campo é necessário
    ];
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
