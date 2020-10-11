<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Employee;
class CustomAuth
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
        //echo "Hi";
        $path=$request->path();
        //if (($path=="login" || $path=="register") && Session ::get('user'))
        if ($path=="login")
        {
            return redirect('/employees');
        }
        else if($path!='login' && !Session ::get('user')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
