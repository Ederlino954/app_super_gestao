@extends('app.layouts.basico')

    @section('titulo', 'Produto')

    @section('conteudo')

        <div class="conteudo-pagina">

            <div class="titulo-pagina-2">
                @if (isset($produto->id))
                    <h1> Editar - Produto </h1>
                @else
                    <h1> Adicionar - Produto </h1>
                @endif
            </div>

            <div class="menu">
                <ul>
                    <li><a href=" {{ route('produto.index') }} ">Voltar</a></li>
                    <li><a href=" ">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                    @if (isset($produto->id))
                        <form action=" {{ route('produto.update', $produto->id) }} " method="POST">
                        @method('PUT')
                    @else
                        <form action=" {{ route('produto.store') }} " method="POST">
                    @endif
                        @csrf
                        <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif

                        <input type="text" name="descricao" value="{{ $produto->descricao ??  old('descricao') }}" placeholder="Descrição" class="borda-preta">
                        @if ($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>
                            </span>
                        @endif

                        <input type="text" name="peso" value="{{ $produto->peso ??  old('peso') }}" placeholder="Peso" class="borda-preta">
                        @if ($errors->has('peso'))
                            <span class="help-block">
                                <strong>{{ $errors->first('peso') }}</strong>
                            </span>
                        @endif

                        <select name="unidade_id" id="">
                            <option>-- Selecione a unidade de medida --</option>

                            @foreach ($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ??  old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('unidade_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unidade_id') }}</strong>
                            </span>
                        @endif

                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>

        </div>

    @endsection

