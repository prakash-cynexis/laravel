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

    public static function noContent($message) {
        $data['error'] = true;
        $data['message'] = $message;
        return response($data, self::HTTP_NO_CONTENT);
    }

    public static function badRequest($message) {
        $data['error'] = true;
        $data['message'] = $message;
        return response($data, self::HTTP_BAD_REQUEST);
    }

    public static function unauthorized($message, $response = [], $headers = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_UNAUTHORIZED, $headers);
    }

    public static function notFound($message) {
        $data['error'] = true;
        $data['message'] = $message;
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

    public static function payloadTooLarge($message, $response = []) {
        $data['error'] = true;
        $data['message'] = $message;
        if (!empty($response)) $data['response'] = $response;
        return response($data, self::HTTP_REQUEST_ENTITY_TOO_LARGE);
    }

    public static function unprocessableEntity($message) {
        $data['error'] = true;
        $data['message'] = $message;
        return response()->json($data, self::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function conflict($message) {
        $data['error'] = true;
        $data['message'] = $message;
        return response()->json($data, self::HTTP_CONFLICT);
    }

    public static function notActive() {
        $data['error'] = true;
        $data['message'] = 'Your Application Is Pending. Thank you for registering for an account with {Company Name}. Thank you for submitting all of your information. We are still reviewing your application. We will notify you of our decision once we have reviewed your information.';
        return response()->json($data, self::HTTP_OK);
    }

    public static function error($message) {
        $data['error'] = true;
        $data['message'] = $message;
        return response()->json($data, self::HTTP_OK);
    }
}
