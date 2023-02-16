<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // don't want a redirect we want an error
        throw new HttpResponseException(response()->json([
            'code' => 'unauthorised',
            'message' => 'You are not authorised to perform this action.',
        ], 401));
        // if (!$request->expectsJson()) {
        //     return route('login');
        // }
    }
}
