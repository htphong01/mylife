<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $message = '';

        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch(TokenExpiredException $e) {
            return response()->json([
                'success' => false,
                'token' => JWTAuth::refresh(JWTAuth::getToken()),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'token' => JWTAuth::refresh(JWTAuth::getToken()),
                'message' => "Fail in login"
            ]);
        } 
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}
