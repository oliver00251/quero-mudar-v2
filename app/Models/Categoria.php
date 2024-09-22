<?php

// app/Models/Categoria.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome', 'tipo','ordem'];

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }
}
