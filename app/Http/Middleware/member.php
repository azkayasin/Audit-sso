<?php

namespace App\Http\Middleware;


use Closure;
use Auth;
class member
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
        $user = Auth::user();
        if($user->status == "member")
        {
            return $next($request);
        }
        return redirect('/hak');
    }
}
