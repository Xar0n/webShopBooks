<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RedirectIsAdmin
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
    	if($request->isMethod('post') and $request->has('login') and $request->has('password'))
		{
			$name = $request->input('login');
			$password = $request->input('password');
			$admin_name = env('ADMIN_NAME');
			$admin_password = env('ADMIN_PASSWORD');
			if(($admin_name === $name) and ($admin_password === $password))
			{
				$request->session()->push('admin.name', $name);
				$request->session()->push('admin.password', $password);
				return redirect('/admin_panel');
			}
		}
        return $next($request);
    }
}
