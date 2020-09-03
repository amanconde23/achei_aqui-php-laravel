<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::user()->usertype == 'admin'){
            // se a verificacao for true, ele passa para o proximo parametro (request q esta sendo feita)
            return $next($request);
        }else{
            return redirect('access-denied');
        }
    }
}
