<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

      $today = date ('D');
      if($today == ''){
        return redirect()->to('system-closed');
      }

        return $next($request);
    }
}
