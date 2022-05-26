<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like','%'.$request->input('nome').'%')
                                  ->where('site', 'like','%'.$request->input('site').'%')
                                  ->where('uf', 'like','%'.$request->input('uf').'%')
                                  ->where('email', 'like','%'.$request->input('email').'%')
                                  ->get();


        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);

    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != '') {
            $regras = [
                'nome' => ['required', 'min:3', 'max:40'],
                'site' => 'required',
                'uf' => ['required', 'min:2', 'max:2'],
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório.',
                'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
                'email' => 'O campo :attribute deve ser um e-mail válido.',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'cadastro realizado com sucesso!';

        };

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
