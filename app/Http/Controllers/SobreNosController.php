<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Models\LogAcesso;

class SobreNosController extends Controller
{
    public function sobreNos(){
        return view('site.sobre-nos');
    }
}
