@if(isset($produto_detalhe->id))
    {{-- edit --}}
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' =>$produto_detalhe->id]) }}" method="POST">
    @csrf
    @method('PUT')
@else
    {{-- create --}}
    <form action="{{ route('produto-detalhe.store') }}" method="POST">
    @csrf
@endif
    <input type="text" value="{{$produto_detalhe->produto_id ?? old('produto_id') }}" name="produto_id" class="borda-preta" placeholder="Produto ID">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="text" value="{{$produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento" class="borda-preta" placeholder="Comprimento">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <input type="text" value="{{$produto_detalhe->largura ?? old('largura') }}" name="largura" class="borda-preta" placeholder="Largura">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}

    <input type="text" value="{{$produto_detalhe->altura ?? old('altura') }}" name="altura" class="borda-preta" placeholder="Altura">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <select name="unidade_id" placeholder="Unidade ID">
        <option value="">--Selecione um unidade de medida--</option>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
