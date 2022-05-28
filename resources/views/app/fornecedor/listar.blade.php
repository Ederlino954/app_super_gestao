@extends('app.layouts.basico')

    @section('titulo', 'Fornecedor')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1>Fornecedor - Listar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('app.fornecedor.adicionar')}} ">Novo</a></li>
                    <li><a href=" {{ route('app.fornecedor')}} ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto; ">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>nome</th>
                                <th>Site</th>
                                <th>UF</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->nome }}</td>
                                    <td>{{ $fornecedor->site }}</td>
                                    <td>{{ $fornecedor->uf }}</td>
                                    <td>{{ $fornecedor->email }}</td>
                                    <td>
                                        <a href=" {{ route('app.fornecedor.editar', $fornecedor->id) }} ">Editar</a>
                                        <a href=" {{ route('app.fornecedor.excluir', $fornecedor->id) }} ">Excluir</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <p>Lista de produtos</p>
                                        <table border="1" style="margin: 20px;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nome</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($fornecedor->produtos as $key => $produto)
                                                    <tr>
                                                        <td>{{ $produto->id }}</td>
                                                        <td>{{ $produto->nome }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2">Nenhum produto encontrado</td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- não perde o resultado da pesquisa ao paginar --}}
                    {{ $fornecedores->appends($request)->links() }}
                    {{-- <hr>
                    {{ $fornecedores->count() }} - total de registros por página
                    <hr>
                    {{ $fornecedores->total() }} - registros encontrados no total
                    <hr>
                    {{ $fornecedores->firstItem() }} - número do primeiro registro da página
                    <hr>
                    {{ $fornecedores->lastItem() }} - número do último registro da página
                    <hr> --}}
                    <hr>
                    Exibindo {{ $fornecedores->count() }} fornecedores do total de {{ $fornecedores->total() }} (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
                </div>
            </div>

        </div>

    @endsection

