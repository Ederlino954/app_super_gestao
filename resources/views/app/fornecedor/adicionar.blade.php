@extends('app.layouts.basico')

    @section('titulo', 'Fornecedor')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                <h1>Fornecedor - Adicionar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('app.fornecedor.adicionar')}} ">Novo</a></li>
                    <li><a href=" {{ route('app.fornecedor')}} ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                {{ $msg }}
                <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                    <form method="post" action="{{ route('app.fornecedor.adicionar') }}" >
                        @csrf
                        <input type="text" name="nome" value=" {{ old('nome') }}" placeholder="Nome" class="borda-preta">
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif

                        <input type="text" name="site" value=" {{ old('site') }}" placeholder="Site" class="borda-preta">
                        @if ($errors->has('site'))
                            <span class="help-block">
                                <strong>{{ $errors->first('site') }}</strong>
                            </span>
                        @endif

                        <input type="text" name="uf" value=" {{ old('uf') }}" placeholder="UF" class="borda-preta">
                        @if ($errors->has('uf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('uf') }}</strong>
                            </span>
                        @endif

                        <input type="text" name="email" value=" {{ old('email') }}" placeholder="E-mail" class="borda-preta">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <button type="submit" class="borda-preta">Cadastrar</button>

                    </form>
                </div>
            </div>

        </div>

    @endsection

