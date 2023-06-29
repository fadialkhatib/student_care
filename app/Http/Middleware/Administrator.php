<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Administrator
{
   
    public function handle(Request $request, Closure $next): Response
    {
        $role = auth()->user()->role;
         if ($role != 'Admin') {
             return response()->json(['message'=>'Not allowed,not an admin!']);
         }
        
         return $next($request);
    }
}
