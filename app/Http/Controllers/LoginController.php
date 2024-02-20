<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';
        if(isset($request->erro) && $request->erro == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        if(isset($request->erro) && $request->erro == 2) {
            $erro = 'Usuário precisa estar logado';
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request) {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.email' => 'E-mail é obrigatório',
            'senha.required' => 'Informe uma senha',
        ];

        $request->validate($regras, $feedback);

        $user = new User();

        $email = $request->get('usuario');
        $password = $request->get('senha');

        // print_r("Email: $email | Password: $password");

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)) {

            session_start();

            $_SESSION['name'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.principal');
    }
}
