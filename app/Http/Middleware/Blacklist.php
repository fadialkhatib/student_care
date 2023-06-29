<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserController;
use App\Models\Black_list;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Report_post;
use App\Models\Post;
use App\Models\Student;


class Blacklist
{
  public function handle(Request $request, Closure $next)
  {
    $blacklist = Black_list::where('user_id',auth()->user()->id )->first();
      if ($blacklist) {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Your account has been blacklisted.'], Response::HTTP_FORBIDDEN);
    } else {

  return $next($request);
    
    }
  }
}