@extends('app.layouts.basico')

@section('titulo', 'Pedido-Produto')

@section('conteudo')

    <div class="titulo-pagina-2">
        <h3>Adicionar Pedido-Produto</h3>
    </div>

    <div class="menu">
        <ul>
            <li><a href="">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div>ID do pedido: {{ $pedido->id }}</div>
        <div>Cliente: {{ $pedido->cliente_id }}</div>
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <h3>Produtos do Pedido</h3>
            <table border="1" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Data de criação do pedido</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pedido->produtos as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nome }}</td>
                            <td>{{ $p->pivot->created_at->format('d/m/Y') }}</td>
                            <td>
                                <form id="form_{{ $p->pivot->id }}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $p->pivot->id, 'pedido' => $pedido->id]) }}">
                                @csrf
                                @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $p->pivot->id }}').submit();">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>

@endsection
