<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Support\AppResponseManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_id' => 'required',
            'device_name' => 'required|in:android,iOS',
            'device_mac_id' => 'required',
        ]);
        if ($validator->fails()) :
            return AppResponseManager::badRequest($validator->errors()->first());
        endif;

        $token = auth('api')->attempt($request->only(['email', 'password']));
        if (!$token) return AppResponseManager::notFound('User data not found.');

        $user = auth('api')->user();
        $user->device->device_id = $request->device_id;
        $user->device->device_name = $request->device_name;
        $user->device->device_mac_id = $request->device_mac_id;
        $user->device->save();

        return AppResponseManager::success('Login Successfully Done.', [
            'user' => $user, 'auth_token' => $token
        ]);
    }
}
