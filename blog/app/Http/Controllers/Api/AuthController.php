<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserLoginRequest;
use config\Constants;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken(Constants::APITOKEN)->plainTextToken;
            return $this->tokenResponse($token);
        }
        return $this->errorResponse(__('auth.failed') ,Response::HTTP_UNAUTHORIZED);
    }

    public function refreshToken(Request $request)
    {
        $token = $request->user()->createToken(Constants::APITOKEN)->plainTextToken;
        return $this->tokenResponse($token);
    }
    public function logout(Request $request)
    {
        Auth::guard('api')->logout();
        return $this->successResponse(array(), trans('auth.logged_out'));
    }

}
