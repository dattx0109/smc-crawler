<?php


namespace App\Http\Middleware;


class AuthMiddlewareService
{
    public function handle($request, \Closure $next)
    {
        if ($request->session()->has('user')) {
            $request->request->add(['user' => session('user')]);
            return $next($request);
        }
        return redirect('/login');
    }
}
