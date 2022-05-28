<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe'); // 1:1

        // 1 registro relacionado em produto_detalhes (fk)
        // produtos (pk)->id
    }
}
