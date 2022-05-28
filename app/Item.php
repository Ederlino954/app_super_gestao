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

    // exemplo Eager Loading - Carrega todos os dados
        public function rel2() /// Eager Loading - Carrega todos os dados
        {
            return $this->hasOne('App\Rel2', 'produto_id', 'id'); // 1:1
        }
    // ------------------------------------------------------
}
