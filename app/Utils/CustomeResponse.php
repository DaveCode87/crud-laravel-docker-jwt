<?php

namespace App\Utils;

use Illuminate\Http\Response;

class CustomeResponse
{

    public static function setSuccessResponse($code, $message = null, $objName = null, $data = null)
    {
        $params = array(
            'success' => true,
            'status_code' => $code,
        );
        if ($objName) {
            $params['data'] = [$objName => $data];
        }
        if ($message) {
            $params['message'] = $message;
        }
        return response()->json($params, $code);
    }

    public static function setFailResponse($code, $message, $erros = null)
    {

        return response()->json(
            [
                'message' => $message,
                'success' => false,
                'errors' => $erros,
                'status_code' => $code,

            ],
            $code
        );
    }
}
