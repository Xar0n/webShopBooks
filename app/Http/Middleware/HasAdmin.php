<?php

namespace App\Http\Middleware;

use Closure;

class HasAdmin
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
    	if($request->session()->has('admin.name') and $request->session()->has('admin.password'))
		{
			$name = $request->session()->get('admin.name')[0];
			$password = $request->session()->get('admin.password')[0];
			$admin_name = env('ADMIN_NAME');
			$admin_password = env('ADMIN_PASSWORD');
			if($admin_name !== $name and $admin_password !== $password)
			{
				return abort('404');
			}
		}
		else return abort('404');
        return $next($request);
    }
}
