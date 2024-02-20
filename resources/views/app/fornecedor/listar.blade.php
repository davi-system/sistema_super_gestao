@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="titulo-pagina-2">
        <h3>Fornecedor - Listar</h3>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.editar', $fornecedor->id) }}">Editar</a></td>
                            <td><a href="{{ route('app.excluir', $fornecedor->id) }}">Excluir</a></td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <p>Lista de produtos</p>
                                <table border="1" style="margin: 20px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td>{{ $produto->id }}</td>
                                                <td>{{ $produto->nome }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $fornecedores->appends($request)->links() }}
            {{-- <br>
            Quantidade de registros por página - {{ $fornecedores->count() }}
            <br>
            Obtendo o primeiro número da ordem da paginação da página - {{ $fornecedores->firstItem() }}
            <br>
            Obtendo o ultimo número da ordem da paginação da página - {{ $fornecedores->lastItem() }}
            <br>
            Obtendo o valor de registros da paginação - {{ $fornecedores->total() }} --}}
            <br>
            Indo de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }} de {{ $fornecedores->total() }} registros
        </div>
    </div>

@endsection
