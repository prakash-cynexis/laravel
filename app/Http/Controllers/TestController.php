<?php

namespace App\Http\Controllers;

use App\Support\WebResponseManager;
use Illuminate\Support\Facades\Session;

class TestController extends Controller {

    public function testRequest() {
        if (Session::has('message')):
            dd(Session::get('message'));
        endif;
        $btn = "<a href='" . url('test/response') . "'>response</a>";
        return $btn;
    }

    public function testResponse() {
        return WebResponseManager::success(['hello' => 'prakash']);
    }
}
