<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtTokenAuthenticator {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) :
                return response()->json(['error' => true, 'message' => 'Auth Token Is Invalid.'], 401);
            endif;
        } catch (TokenExpiredException $e) {
            try {
                $newToken = auth('api')->refresh();
            } catch (TokenExpiredException $e) {
                return response()->json(['error' => true, 'message' => $e->getMessage()], 401);
            } catch (JWTException $e) {
                return response()->json(['error' => true, 'message' => $e->getMessage()], 401);
            }
            // send the refreshed token back to the client
            return response()->json(['error' => true, 'message' => "Auth Token Expired"], 401, ['Authorization' => 'Bearer ' . $newToken]);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => true, 'message' => 'Auth Token Is Invalid.'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => true, 'message' => 'Auth Token Missing.'], 401);
        }
        return $next($request);
    }
}
