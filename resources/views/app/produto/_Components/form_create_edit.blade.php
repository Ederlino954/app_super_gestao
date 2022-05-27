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
    @if (isset($produto->id))
        <button type="submit" class="borda-preta">Atualizar</button>
    @else
        <button type="submit" class="borda-preta">Cadastrar</button>
    @endif

    </form>
