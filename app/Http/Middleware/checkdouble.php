<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkdouble
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_name = User::where("user_name", $request->user_name)->take(1)->get("user_name");
        if($request->user_name == $user_name[0]->user_name){
            return redirect('resign');
        }

        return $next($request);
    }
}
