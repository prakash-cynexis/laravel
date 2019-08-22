<?php

namespace App\Support;

use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class WebResponseManager extends Response {

    public static function error($message) {
        Session::flash('message', $message);
        Session::flash('type', 'Error!');
        Session::flash('alert-class', 'alert-danger');
        return back()->withInput();
    }

    public static function success($message) {
        Session::flash('message', $message);
        Session::flash('type', 'Success!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
