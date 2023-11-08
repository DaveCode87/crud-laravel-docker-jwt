<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use App\Utils\CustomeResponse;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    public function action(Request $request)
    {
        auth()->logout();
        return CustomeResponse::setSuccessResponse(Response::HTTP_OK,'logout success');
    }
}
