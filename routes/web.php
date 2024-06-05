<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\LogAcessoMiddleware;

Route::get('/', [PrincipalController::class, 'principal'])
    ->name('site.index')
    ->middleware('log.acesso');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//app
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
        ->name('app.home');

    Route::get('/sair', [LoginController::class, 'sair'])
        ->name('app.sair');
    
    Route::get('/cliente', [ClienteController::class, 'index'])
        ->name('app.cliente');
    
    Route::get('/fornecedor', [FornecedorController::class, 'index'])
        ->name('app.fornecedor');
    
        Route::get('/produto', [ProdutoController::class, 'index'])
        ->name('app.produto');
      
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste');

//Rota de contingência
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para ser redirecionado a página inicial';
});
