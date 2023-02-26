<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use config\Constants;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    const MAXPOSTS = 10 ;
    const MAXCOMMENTS = 10 ;

    protected function successResponse($data, $message = '', $code = Response::HTTP_OK)
    {
        return response()->json([
            Constants::STATUS => Constants::SUCCESS ,
            Constants::MESSAGE => $message,
            Constants::DATA => $data
        ], $code);
    }

    protected function errorResponse($message = "", $code)
    {
        return response()->json([
            Constants::STATUS => SELF::Error,
            Constants::MESSAGE => $message,
            'data' =>array()
        ], $code);
    }

    protected function tokenResponse($token)
    {
        return response()->json([
            Constants::STATUS => Constants::SUCCESS,
            Constants::MESSAGE => trans('auth.token_refreshed'),
            Constants::ACEESSTOKEN => $token,
            Constants::TOKENTYPE => Constants::BEARER,
            Constants::EXPIRES => config('sanctum.expiration')
        ], Response::HTTP_OK);
    }
}
