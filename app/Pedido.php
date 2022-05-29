<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos()
    {
        // return $this->belongsToMany('App\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id'); // situação de nomes fora do padrão

        /* N:N
        * 1-modelo de relacionamento N:N em relação ao modelo em que estamos implementando
        * 2-é a tabela auxiliar qie armazena os registros de relacionamentos
        * 3-representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
        * 4-representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
        */


    }
}
