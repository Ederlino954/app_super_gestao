@extends('app.layouts.basico')

    @section('titulo', 'Detalhes do Produto')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1> Editar Detalhes do Produto </h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">Voltar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                {{-- {{ $produto_detalhe->tojson() }} --}}
                <h4>Produto</h4>
                <div>Nome: {{ $produto_detalhe->item->nome }} </div>
                {{-- {{ $produto_detalhe->tojson() }} --}}
                <br>
                <div>Descrição: {{ $produto_detalhe->item->descricao }} </div>

                <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                    @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])

                    @endcomponent
                </div>
            </div>

        </div>

    @endsection

