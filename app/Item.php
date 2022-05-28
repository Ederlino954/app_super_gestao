<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id'); // 1:1

        // 1 registro relacionado em produto_detalhes (fk)
        // produtos (pk)->id
    }
}
