<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $method_autenticacao, $perfil) // parametro para middleware
    {
        // Verifica se o usuario tem acesso a rota
        echo $method_autenticacao.'-'. $perfil .'<br>';

        if ($method_autenticacao == 'padrao') {
            echo 'Verificar o usuario e senha no banco de dados'. $perfil .'<br>';
        }

        if ($method_autenticacao == 'ldap') {
            echo 'Verificar o usuario e senha no AD'. $perfil .'<br>';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados';
        }

        if (false) {
            return $next($request);

        } else {
            return Response('Acesso negado! Rota exige autenticação!');
        }

    }
}
