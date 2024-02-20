<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Quando coloca ? na frente do parâmetro, endica que é opcional
Route::get('/', 'PrincipalController@principal')->name('site.principal')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'FornecedoresController@index')->name('app.fornecedor');
    Route::get('/fornecedor/adicionar', 'FornecedoresController@adicionar')->name('app.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedoresController@adicionar')->name('app.adicionar');
    Route::post('/fornecedor/listar', 'FornecedoresController@listar')->name('app.listar');
    Route::get('/fornecedor/listar', 'FornecedoresController@listar')->name('app.listar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedoresController@editar')->name('app.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedoresController@excluir')->name('app.excluir');

    // Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    Route::resource('produto', 'ProdutoController');

    // produto-detalhe
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');

    // Route::resource('pedido-produto', 'PedidoProdutoController');
    Route::get('/pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('/pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    // Route::delete('/pedido-produto/destroy/{pedido}/{produto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
    Route::delete('/pedido-produto/destroy/{pedidoProduto}/{pedido}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'Essa rota não existe. <a href="'.route('site.principal').'"> Clique aqui</a> para voltar ao início.';
});
