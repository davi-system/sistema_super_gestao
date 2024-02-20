<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // $contato = new SiteContato();
        // $contato->create($request->all());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'Valor mínimo de 3 caracteres',
            'nome.max' => 'Valor máxmo de 40 caracteres',
            'nome.unique' => 'Nome já em uso',
            'email.email' => 'E-mail inválido',
            'mensagem.max' => 'Valor máximo de 2000 caracteres',
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.principal');
    }
}
