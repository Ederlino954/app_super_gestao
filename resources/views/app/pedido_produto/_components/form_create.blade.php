
<form action=" {{ route('pedido-produto.store', ['pedido' => $pedido]) }} " method="POST">

    @csrf

    <select name="produto_id" id="">
        <option>-- Selecione um produto --</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>
        @endforeach
    </select>
    @if ($errors->has('produto_id'))
        <span class="help-block">
            <strong>{{ $errors->first('produto_id') }}</strong>
        </span>
    @endif


    <button type="submit" class="borda-preta">Cadastrar</button>


</form>
