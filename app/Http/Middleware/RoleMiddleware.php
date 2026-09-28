<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {

        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRole = auth()->user()->userrole;
  
        if ($userRole == 'admin') 
            {
            if ($role == 'admin') 
                {
                    return $next($request);
                }
            return redirect('/admin/layout.app');
        }

        if ($userRole == 'student') 
            {
            if ($role == 'student') {
                return $next($request);}
            return redirect('/useraddcategory');
        }
    }
}