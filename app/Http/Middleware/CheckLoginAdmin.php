<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
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
        // kiểm tra $type ở config-> auth ->gaurd 
        if (!get_data_user('admins')) {
            return redirect()->route('admin.get.login');
        }
        return $next($request);
    }
}