<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthMiddleware
 * @package App\Http\Middleware
 */
class AuthMiddleware
{
    /**
     * Handle an incoming request.
     * @param  Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		$correctPassword = bcrypt('really_strong_password');
		$password = $request->route('password');
		if (Hash::check($password, $correctPassword)) {
			return $next($request);
		}
		abort(403);
    }
}
