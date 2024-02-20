<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(['log' => "IP $ip acessou a rota $rota"]);
        // return $next($request);

        $resposta = $next($request);

        $resposta->SetStatusCode(201, 'status code foi modificado');

        // dd($resposta);

        return $resposta;
    }
}
