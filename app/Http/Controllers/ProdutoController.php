<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {
        echo '<h1>Produtos</h1>';
    }

    public function create()
    {
        echo '<h1>Cadastro de Produtos</h1>';
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Produto $produto)
    {
        //
    }

    public function edit(Produto $produto)
    {
        //
    }

    public function update(Request $request, Produto $produto)
    {
        //
    }

    public function destroy(Produto $produto)
    {
        //
    }
}
