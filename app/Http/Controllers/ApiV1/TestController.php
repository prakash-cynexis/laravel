<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Support\AppResponseManager;
use App\Support\WebResponseManager;
use Illuminate\Support\Facades\Session;

class TestController extends Controller {

    public function hello() {
        return AppResponseManager::success('hello prakash');
    }

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
