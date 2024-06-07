<?php

namespace App\Http\Controllers;
use App\Models\SiteContato;
use App\Models\MotivoContato;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome pode ter no máximo 40 caracteres',
            'email.email' => 'O email informado não é válido',
            'motivo_contatos_id.required' => 'Um motivo precisa ser selecionado',
            'mensagem.max' => 'O campo mensagem pode ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido',
        ];
        
        $request->validate($regras, $feedback);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    
        //$contato = new SiteContato();
        //$contato->create($request->all());
    }
}

