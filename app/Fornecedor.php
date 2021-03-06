<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{

    //fornecedors // padrão do framework
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos()
    {
        return $this->hasMany('App\Produto', 'fornecedor_id', 'id'); // 1 fornecedor pode ter vários produtos
    }
}
