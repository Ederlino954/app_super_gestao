<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato',  ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        // dd($request);

        $request->validate([
            'nome' => 'required|min:3|max:100',
            'telefone' => 'required|min:3',
            'email' => 'required|min:3',
            'motivo_contato' => 'required|min:3',
            'mensagem' => 'required|min:3|max:1000',
        ]);

        // SiteContato::create($request->all());

        // return redirect()->route('site.contato');

    }
}
