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
            'nome' => ['required','min:3','max:40','unique:site_contatos'], // unique para fins de teste
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => ['required','min:3','max:2000']
        ],
        [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome já está cadastrado',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'motivo_contatos_id.required' => 'O campo motivo de contato é obrigatório',
            'mensagem.required' => 'O campo mensagem é obrigatório',
            'mensagem.min' => 'O campo mensagem deve ter no mínimo 3 caracteres',
            'mensagem.max' => 'O campo mensagem deve ter no máximo 2000 caracteres',
            // 'required' => 'O campo deve ser preenchido', // forma direta de mensagem padronizada
            // 'reuired' => 'O campo :attribute deve ser preenchido', // forma direta de mensagem padronizada
        ]
    );

        SiteContato::create($request->all());

        return redirect()->route('site.index');

    }
}
