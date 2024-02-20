@extends('app.layouts.basico')

@section('titulo', 'Produto-Detalhe')

@section('conteudo')

    <div class="titulo-pagina-2">
        <h3>Editar Produto-Detalhe</h3>
    </div>

    <div class="menu">
        <ul>
            <li><a href="#">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">

            <h4>Produto</h4>
            <div>Nome: {{ $produto->item->nome }}</div>
            <br>
            <div>Descricao: {{ $produto->item->descricao }}</div>
            <br>

            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto, 'unidades' => $unidades])
            @endcomponent
        </div>
    </div>

@endsection
