<?php

// app/Models/Conta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['nome', 'tipo', 'saldo'];

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }
}
