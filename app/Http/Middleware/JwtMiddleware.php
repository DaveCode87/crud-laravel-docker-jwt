<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Utils\CustomeResponse;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
// use JWTAuth;


class JwtMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed  
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                $errorMsg = 'Invalid token ';
                return CustomeResponse::setFailResponse(Response::HTTP_NOT_ACCEPTABLE, $errorMsg, '');
            }
            else if ($e instanceof TokenExpiredException) {
                $errorMsg = 'Expired token ';
                return CustomeResponse::setFailResponse(Response::HTTP_NOT_ACCEPTABLE, $errorMsg, '');
            }
            else {
                $errorMsg = 'Token not found';
                return CustomeResponse::setFailResponse(Response::HTTP_NOT_ACCEPTABLE, $errorMsg, '');
            }
        }

        return $next($request);
    }
}
