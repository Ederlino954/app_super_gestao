@extends('app.layouts.basico')

    @section('titulo', 'pedido')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1>Listagem de Pedidos</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('pedido.create') }} ">Novo</a></li>
                    <li><a href="  ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto; ">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>Cliente</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->cliente_id }}</td>
                                    <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar produtos</a></td>
                                    <td><a href=" {{ route('pedido.show', ['pedido' => $pedido->id ]) }} ">visualizar</a></td>
                                    <td>
                                        <form id="form_{{$pedido->id}}" action=" {{ route('pedido.destroy', ['pedido' => $pedido->id ]) }} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()" >excluir</a>
                                        </form>
                                    </td>
                                    <td><a href=" {{ route('pedido.edit', ['pedido' => $pedido->id ]) }} ">Editar</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum pedido encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- não perde o resultado da pesquisa ao paginar --}}
                    {{ $pedidos->appends($request)->links() }}

                    Exibindo {{ $pedidos->count() }} pedidos do total de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
                </div>
            </div>

        </div>

    @endsection

