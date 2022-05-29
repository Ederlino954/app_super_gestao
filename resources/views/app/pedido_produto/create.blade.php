@extends('app.layouts.basico')

    @section('titulo', 'Pedido')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1> Adicionar Produtos ao Pedido </h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('produto.index') }} ">Voltar</a></li>
                    <li><a href=" ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <h4>detalhes do pedido</h4>
                <p>ID do pedido: {{ $pedido->id }}</p>
                <p>Cliente: {{ $pedido->cliente_id }}</p>

                <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                    <h4>itens do pedido</h4>
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Data de inclusão do item no pedido</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ $pedido->produtos }} --}}
                            @foreach($pedido->produtos as $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $pedido->pivot->id, 'pedido_id' => $pedido->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])

                    @endcomponent
                </div>
            </div>

        </div>

    @endsection

