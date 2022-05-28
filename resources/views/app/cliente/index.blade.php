@extends('app.layouts.basico')

    @section('titulo', 'Cliente')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1>Listagem de Clientes</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('cliente.create') }} ">Novo</a></li>
                    <li><a href="  ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto; ">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td><a href=" {{ route('cliente.show', ['cliente' => $cliente->id ]) }} ">visualizar</a></td>
                                    <td>
                                        <form id="form_{{$cliente->id}}" action=" {{ route('cliente.destroy', ['cliente' => $cliente->id ]) }} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()" >excluir</a>
                                            {{-- <button type="submit">excluir</button> --}}
                                        </form>
                                    </td>
                                    <td><a href=" {{ route('cliente.edit', ['cliente' => $cliente->id ]) }} ">Editar</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum cliente encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- não perde o resultado da pesquisa ao paginar --}}
                    {{ $clientes->appends($request)->links() }}

                    Exibindo {{ $clientes->count() }} clientes do total de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
                </div>
            </div>

        </div>

    @endsection

