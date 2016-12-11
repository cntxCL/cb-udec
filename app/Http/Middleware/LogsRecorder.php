<?php

namespace App\Http\Middleware;

use Closure;

class LogsRecorder
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
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if($reponse->status() != 200) return;

        $user = Auth::check() ? Auth::user()->personal->nombre : "Usuario desconocido";
        $controller = $request->route()->getController();
        $action = $request->route()->getAction();

        Log::create([
            'descripcion' => $user . ' ' . $controller . '.' . $action,
            'user_id' => Auth::check() ? Auth::id() : 1
        ]);
    }
}
