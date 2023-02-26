<?php

namespace App\Http\Middleware;

use Closure;
use config\Constants;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
class ApiKeyMiddleware extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->header('api_key') || $request->header('api_key') != config('api_key')) {
            return response()->json([
                Constants::STATUS => Constants::ERROR,
                Constants::MESSAGE => __('auth.api_token_error')
            ] ,Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
