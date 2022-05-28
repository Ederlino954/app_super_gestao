<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        foreach ($produtos as $key => $produto) {
            // $produto->unidade = Unidade::find($produto->unidade_id);
            // print_r($produto->getAttributes());
            // echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first(); // sem first vem a collection

            if (isset($produtoDetalhe)) {
                // print_r($produtoDetalhe->getAttributes());

                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
        }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => ['required', 'min:3', 'max:40'],
            'descricao' => ['required', 'min:3', 'max:2000'],
            'peso' => ['required', 'integer'],
            'unidade_id' => 'exists:unidades,id', /// validação em caso de foreign key
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'unidade_id.exists' => 'A unidade de medida informada não existe.',
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');

        /* ***********************************************************
            // EXEMPLO = em caso de tratativa de algum parametro individualmente

            $produto = new Produto();

            $nome = $request->input('nome');
            $descricao = $request->input('descricao');

            $nome = strtoupper($nome);  // se fosse o caso de salvar o nome em maisculo

            $produto->nome = $nome;
            $produto->descricao = $descricao;

            $produto->save();
        */ /// ******************************************************

    }

    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    public function update(Request $request, Produto $produto)
    {
        // dd($request->all()); // payload // dados uteis
        // dd($produto->getAttributes()); // instancia do objeto no estado anterior

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index', ['produto' => $produto->id]);
    }
}
