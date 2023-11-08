<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Utils\CustomeResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function action(LoginRequest $request)
    {
        $token = auth()->attempt($request->only('email', 'password'));

        if (!$token) {
            $errorMsg = "Credential Incorrect";
            return CustomeResponse::setFailResponse(Response::HTTP_NOT_ACCEPTABLE,$errorMsg,'');
        }

        return response()->json(['token' => $token]);
    }
}
