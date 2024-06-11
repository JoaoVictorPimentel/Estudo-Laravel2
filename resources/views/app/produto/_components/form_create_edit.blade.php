@if(isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
@endif
    <input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first() : '' }}

    <input type="text" name="descricao" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first() : '' }}

    <input type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first() : '' }}
    <select name="unidade_id" id="">
        <option>-- Selecione a Unidade de Medida --</option>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first() : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>