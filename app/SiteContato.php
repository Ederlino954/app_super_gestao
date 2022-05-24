<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    // site_contatos // padrão do framework
    
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];


}
