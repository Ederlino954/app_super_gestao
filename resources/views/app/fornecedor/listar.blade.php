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
                                        {{-- <a href=" {{ route('app.fornecedor.editar', $fornecedor->id) }} ">Editar</a> --}}
                                        {{-- <a href=" {{ route('app.fornecedor.excluir', $fornecedor->id) }} ">Excluir</a> --}}
                                        <a href=" # ">Editar</a>
                                        <a href=" #">Excluir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    @endsection

