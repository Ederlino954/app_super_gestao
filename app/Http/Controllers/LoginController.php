<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use LDAP\Result;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não existe!';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso à página!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){

        //regras de validação
        $regras = [
            'usuario' => ['required','email'],
            'senha' => ['required','min:3']
        ];

        // as mensagens de feedback de validação
        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute deve ser um e-mail válido',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres'
        ];

        $request->validate($regras, $feedback);

        // recuperando os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Iniciar o model User
        $user = new User();

        $usuario = $user->where('email', $email)
                       ->where('password', $password)
                       ->get()->first();

        if (isset($usuario)) {

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // dd($_SESSION); // sessão sendo construida

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        // dd($usuario);

    }

    public function sair(){
        // session_start();
        // session_destroy();
        // return redirect()->route('site.login');

        echo ('sair');
    }


}
