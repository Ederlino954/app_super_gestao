<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        // $pedido->produtos; // eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required',
        ];

        $mensagens = [
            'produto_id.exists' => 'O produto não existe',
            'quantidade.required' => 'A quantidade é obrigatória',
        ];

        $request->validate($regras, $mensagens);

        //****************************************** */
        // $pedidoProduto = new PedidoProduto();
        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id = $request->get('produto_id');
        // $pedidoProduto->quantidade = $request->get('quantidade');
        // $pedidoProduto->save();
        //****************************************** */

        // // $pedido->produtos; // registros do relacionamento
        // $pedido->produtos()->attach(
        //     $request->get('produto_id'),
        //     ['quantidade' => $request->get('quantidade') // e demais colunas que precisar
        // ]); // objeto

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')] // ir incluindo conforme necessidade
            // $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
        ]); // exemplo em caso de multiplos salvamentos de registros

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
