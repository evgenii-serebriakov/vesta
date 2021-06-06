<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckParam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$a)
    {

        if ((int) $request->route('id') !== 99) {
            return redirect()->route('home');
        }
            

        $res = $next($request);

        // dd($res);

        return $res;
    }
}
