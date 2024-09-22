<?php

// app/Models/Fornecedor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['nome', 'contato'];

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}
