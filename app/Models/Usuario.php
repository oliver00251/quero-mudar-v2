<?php

// app/Models/Usuario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'senha', 'tipo'];

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }
}
