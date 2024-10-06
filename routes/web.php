<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteDemandaController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\detalhamentoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
Route::get('/detalhamento', [detalhamentoController::class, 'index'])->name('detalhamento.index');

Route::get('{dia?}/{mes?}/{ano?}/{tipo?}', [HomeController::class, 'index'])->name('home.index');
// Define a rota para o método cliente no HomeController
Route::get('/clientes-demandas', [HomeController::class, 'cliente'])->name('cliente.index');
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::prefix('clientes')->group(function () {
        // Rota para exibir a lista de clientes e o formulário de criação
        Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');

        // Rota para exibir o formulário de criação
        Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');

        // Rota para armazenar um novo cliente
        Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
        // Rota para armazenar um novo cliente
        Route::post('/', [ClienteController::class, 'storeMorada'])->name('clientes.store.morada');

        // Rota para exibir o formulário de edição
        Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

        // Rota para atualizar um cliente existente
        Route::put('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');

        // Rota para excluir um cliente
        Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    });

    // Rotas para gerenciar endereços
    Route::prefix('enderecos')->group(function () {
        // Rota para armazenar um novo endereço
        Route::post('/', [ClienteController::class, 'store'])->name('enderecos.store');

        // Rota para atualizar um endereço existente
        Route::put('/{endereco}', [ClienteController::class, 'update'])->name('enderecos.update');

        // Rota para excluir um endereço
        Route::delete('/{endereco}', [ClienteController::class, 'destroy'])->name('enderecos.destroy');
    });


    // Categorias
    Route::prefix('categorias')->name('categorias.')->group(function () {
        Route::get('/', [CategoriaController::class, 'index'])->name('index');
        Route::get('create', [CategoriaController::class, 'create'])->name('create');
        Route::post('/', [CategoriaController::class, 'store'])->name('store');
        Route::delete('{categoria}', [CategoriaController::class, 'destroy'])->name('destroy');
    });

    // Contas
    Route::prefix('contas')->name('contas.')->group(function () {
        Route::get('/', [ContaController::class, 'index'])->name('index');
        Route::get('create', [ContaController::class, 'create'])->name('create');
        Route::post('/', [ContaController::class, 'store'])->name('store');
        Route::get('{conta}', [ContaController::class, 'show'])->name('show');
        Route::get('{conta}/edit', [ContaController::class, 'edit'])->name('edit');
        Route::put('{conta}', [ContaController::class, 'update'])->name('update');
        Route::delete('{conta}', [ContaController::class, 'destroy'])->name('destroy');
    });

    // Fornecedores
    Route::prefix('fornecedores')->name('fornecedores.')->group(function () {
        Route::get('/', [FornecedorController::class, 'index'])->name('index');
        Route::get('create', [FornecedorController::class, 'create'])->name('create');
        Route::post('/', [FornecedorController::class, 'store'])->name('store');
        Route::get('{fornecedor}', [FornecedorController::class, 'show'])->name('show');
        Route::get('{fornecedor}/edit', [FornecedorController::class, 'edit'])->name('edit');
        Route::put('{fornecedor}', [FornecedorController::class, 'update'])->name('update');
        Route::delete('{fornecedor}', [FornecedorController::class, 'destroy'])->name('destroy');
    });

    // Pagamentos
    Route::prefix('pagamentos')->name('pagamentos.')->group(function () {
        Route::get('/', [PagamentoController::class, 'index'])->name('index');
        Route::delete('/excluir/{id}', [PagamentoController::class, 'destroyPagamento'])->name('destroy-transacao');
        Route::post('/', [PagamentoController::class, 'store'])->name('store');
    });
    // Transações
    Route::prefix('transacoes')->name('transacoes.')->group(function () {
        Route::get('/', [TransacaoController::class, 'index'])->name('index');
        Route::get('create', [TransacaoController::class, 'create'])->name('create');
        Route::post('/', [TransacaoController::class, 'store'])->name('store');
        Route::get('{transacao}', [TransacaoController::class, 'show'])->name('show');
        Route::get('{transacao}/edit', [TransacaoController::class, 'edit'])->name('edit');
        Route::put('{transacao}', [TransacaoController::class, 'update'])->name('update');
        Route::delete('{transacao}', [TransacaoController::class, 'destroy'])->name('destroy');
    });

    // Usuários
    Route::prefix('usuarios')->name('usuarios.')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('index');
        Route::get('create', [UsuarioController::class, 'create'])->name('create');
        Route::post('/', [UsuarioController::class, 'store'])->name('store');
        Route::get('{usuario}', [UsuarioController::class, 'show'])->name('show');
        Route::get('{usuario}/edit', [UsuarioController::class, 'edit'])->name('edit');
        Route::put('{usuario}', [UsuarioController::class, 'update'])->name('update');
        Route::delete('{usuario}', [UsuarioController::class, 'destroy'])->name('destroy');
    });

});