@if (isset($pedido->id))
    <form action=" {{ route('pedido.update', $pedido->id) }} " method="POST">
    @method('PUT')
@else
    <form action=" {{ route('pedido.store') }} " method="POST">
@endif
        @csrf

        <select name="cliente_id" id="">
            <option>-- Selecione um Cliente --</option>

            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ??  old('cliente_id')) == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>
            @endforeach
        </select>
        @if ($errors->has('cliente_id'))
            <span class="help-block">
                <strong>{{ $errors->first('cliente_id') }}</strong>
            </span>
        @endif

    @if (isset($produto->id))
        <button type="submit" class="borda-preta">Atualizar</button>
    @else
        <button type="submit" class="borda-preta">Cadastrar</button>
    @endif

    </form>
