@if (isset($produto_detalhe->id))
    <form action=" {{ route('produto-detalhe.update', ['produto_detalhe' =>$produto_detalhe->id]) }}" method="POST">
    @method('PUT')
@else
    <form action=" {{ route('produto-detalhe.store') }} " method="POST">
@endif
        @csrf
        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="Id do produto" class="borda-preta">
        @if ($errors->has('produto_id'))
            <span class="help-block">
                <strong>{{ $errors->first('produto_id') }}</strong>
            </span>
        @endif

        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ??  old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
        @if ($errors->has('comprimento'))
            <span class="help-block">
                <strong>{{ $errors->first('comprimento') }}</strong>
            </span>
        @endif

        <input type="text" name="largura" value="{{ $produto_detalhe->peso ?? old('largura') }}" placeholder="Largura" class="borda-preta">
        @if ($errors->has('largura'))
            <span class="help-block">
                <strong>{{ $errors->first('largura') }}</strong>
            </span>
        @endif

        <input type="text" name="altura" value="{{ $produto_detalhe->peso ?? old('altura') }}" placeholder="Altura" class="borda-preta">
        @if ($errors->has('altura'))
            <span class="help-block">
                <strong>{{ $errors->first('altura') }}</strong>
            </span>
        @endif

        <select name="unidade_id" id="">
            <option>-- Selecione a unidade de medida --</option>

            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ??  old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        @if ($errors->has('unidade_id'))
            <span class="help-block">
                <strong>{{ $errors->first('unidade_id') }}</strong>
            </span>
        @endif
    @if (isset($produto_detalhe->id))
        <button type="submit" class="borda-preta">Atualizar</button>
    @else
        <button type="submit" class="borda-preta">Cadastrar</button>
    @endif

    </form>
