<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00',
                'ddd' => '12',
                'telefone' => '1111-1111'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '22',
                'ddd' => '82',
                'telefone' => '2222-2222'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '33',
                'ddd' => '84',
                'telefone' => '3333-3333'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
