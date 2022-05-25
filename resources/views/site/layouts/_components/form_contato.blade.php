{{-- {{ $slot }} --}}

<form action="{{ route('site.contato') }}" method="post">
    @csrf
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
        @if ($errors->has('nome'))
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
    <br>
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
        @if ($errors->has('telefone'))
            <span class="help-block">
                <strong>{{ $errors->first('telefone') }}</strong>
            </span>
        @endif
    <br>
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
        {{-- {{ ($errors->has('email')) ? $errors->first('email') : '' }} --}}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    <br>
        {{-- {{ dd($motivo_contatos)}} --}}
        <select name="motivo_contatos_id" class="{{ $classe }}">
            <option value="">Qual o motivo do contato?</option>
            @foreach ($motivo_contatos as $key => $motivo_contato)
                <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }} >{{ $motivo_contato->motivo_contato }}</option>
            @endforeach
        </select>
        @if ($errors->has('motivo_contatos_id'))
            <span class="help-block">
                <strong>{{ $errors->first('motivo_contatos_id') }}</strong>
            </span>
        @endif
    <br>
        <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem ' }} </textarea>
        @if ($errors->has('mensagem'))
            <span class="help-block">
                <strong>{{ $errors->first('mensagem') }}</strong>
            </span>
        @endif
    <br>
        <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if ($errors->any())
    <div>
        @foreach ( $errors->all() as $error )
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif --}}
