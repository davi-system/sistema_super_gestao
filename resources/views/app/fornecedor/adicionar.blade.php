@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="titulo-pagina-2">
        <h3>Fornecedor - Adicionar</h3>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            {{ $msg ?? '' }}
            <form action="{{ route('app.adicionar') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $fornecedor->id ?? '' }}" name="id">

                <input type="text" value="{{ $fornecedor->nome ?? old('nome') }}" name="nome" class="borda-preta" placeholder="Nome">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" value="{{ $fornecedor->site ?? old('site') }}" name="site" class="borda-preta" placeholder="Site">
                {{ $errors->has('site') ? $errors->first('site') : '' }}

                <input type="text" value="{{ $fornecedor->uf ?? old('uf') }}" name="uf" class="borda-preta" placeholder="UF">
                {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                <input type="text" value="{{ $fornecedor->email ?? old('email') }}" name="email" class="borda-preta" placeholder="E-mail">
                {{ $errors->has('email') ? $errors->first('email') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>

@endsection
