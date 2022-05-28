<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo '<script>alert("Produto detalhe cadastrado com sucesso!");</script>';
    }

    public function show($id)
    {
        //
    }

    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe], ['unidades' => $unidades]);
    }

    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo 'A atualização foi realizada com sucesso!';
    }

    public function destroy($id)
    {
        //
    }
}