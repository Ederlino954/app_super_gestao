<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.index',  ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => ['exists:clientes,id'],
        ];

        $mensagens = [
            'cliente_id.exists' => 'Cliente não encontrado',
        ];

        $request->validate($regras, $mensagens);

        $pedido = new Pedido();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();

        return redirect()->route('pedido.index');
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
