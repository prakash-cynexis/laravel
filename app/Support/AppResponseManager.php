<?php

namespace App\Support;

use Symfony\Component\HttpFoundation\Response;

class AppResponseManager extends Response {

    public static function continue($message, $response = []) {
        $data['error'] = false;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_CONTINUE);
    }

    public static function processing($message, $response = []) {
        $data['error'] = false;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_PROCESSING);
    }

    public static function earlyHints($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_EARLY_HINTS);
    }

    public static function success($message, $response = []) {
        $data['error'] = false;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_OK);
    }

    public static function created($message, $response = []) {
        $data['error'] = false;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_CREATED);
    }

    public static function noContent($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_NO_CONTENT);
    }

    public static function badRequest($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_BAD_REQUEST);
    }

    public static function unauthorized($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_UNAUTHORIZED);
    }

    public static function notFound($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_NOT_FOUND);
    }

    public static function methodNotAllowed($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_METHOD_NOT_ALLOWED);
    }

    public static function notAcceptable($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_NOT_ACCEPTABLE);
    }
}