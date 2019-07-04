<?php

namespace App\Support;

use Symfony\Component\HttpFoundation\Response;

class AppResponse extends Response {

    public static function success($message, $response = [], $httpStatus = 200) {
        $data['error'] = false;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response()->json($data, $httpStatus);
    }

    public static function error($message, $httpStatus = 400) {
        $data['error'] = true;
        $data['message'] = $message;
        return response()->json($data, $httpStatus);
    }
}