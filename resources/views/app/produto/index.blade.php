@extends('app.layouts.basico')

    @section('titulo', 'Produto')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1>Listagem de produtos</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('produto.create') }} ">Novo</a></li>
                    <li><a href="  ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto; ">
                    {{-- {{ $produtos->toJson() }} --}}
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Fornecedor</th>
                                <th>Site</th>
                                <th>Peso</th>
                                <th>Unidade_id</th>
                                <th>Comprimento</th>
                                <th>Altura</th>
                                <th>Largura</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->fornecedor->nome }}</td>
                                    <td>{{ $produto->fornecedor->site }}</td>
                                    <td>{{ $produto->peso }}</td>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td>{{ $produto->itemDetalhe->comprimento ?? '' }} </td>
                                    <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                    <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                    <td><a href=" {{ route('produto.show', ['produto' => $produto->id ]) }} ">visualizar</a></td>
                                    <td>
                                        <form id="form_{{$produto->id}}" action=" {{ route('produto.destroy', ['produto' => $produto->id ]) }} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()" >excluir</a>
                                            {{-- <button type="submit">excluir</button> --}}
                                        </form>
                                    </td>
                                    <td><a href=" {{ route('produto.edit', ['produto' => $produto->id ]) }} ">Editar</a></td>
                                </tr>

                                <tr>
                                    <td colspan="12">
                                        <p>Pedidos</p>
                                        @foreach ($produto->pedidos as $pedido )
                                            <a href="{{ route('pedido-produto.create', ['pedido'=>$pedido->id]) }}">
                                                Pedido: {{ $pedido->id }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum produto encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- {{ $produtos->toJson() }} --}}

                    {{-- não perde o resultado da pesquisa ao paginar --}}
                    {{ $produtos->appends($request)->links() }}

                    Exibindo {{ $produtos->count() }} produtos do total de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                </div>
            </div>

        </div>

    @endsection

