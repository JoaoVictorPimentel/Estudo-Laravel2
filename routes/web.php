<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middleware\LogAcessoMiddleware;

Route::middleware(LogAcessoMiddleware::class)
    ->get('/', [PrincipalController::class, 'principal'])
    ->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])
    ->name('site.contato')
    ->middleware(LogAcessoMiddleware::class);

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login', function () {
    return 'login';
})->name('site.login');

//app
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'clientes';
    })->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste');

//Rota de contingência
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para ser redirecionado a página inicial';
});
