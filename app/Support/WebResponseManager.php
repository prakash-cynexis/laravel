<?php

namespace App\Support;

use Symfony\Component\HttpFoundation\Response;

class WebResponseManager extends Response {

    public static function error($message) {
        return back()->with(['message' => $message])->withInput();
    }

    public static function success($message) {
        return back()->with(['message' => $message]);
    }
}