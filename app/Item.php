<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe() /// Lazy Loading - Carrega apenas quando for necessário
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id'); // 1:1
    }


    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor'); // 1 produto pertence a 1 fornecedor
    }


}
