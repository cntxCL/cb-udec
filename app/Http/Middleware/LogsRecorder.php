<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Log;

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
        $descripcion = $request->route()->getName();
        $descripcion .= ' (status ' . $response->status() . ')';

        $log = Log::create([
            'descripcion' => $descripcion,
            'user_id' => Auth::id(),
        ]);
    }
}
