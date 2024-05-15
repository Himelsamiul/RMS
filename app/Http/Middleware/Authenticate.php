<?php

namespace App\Http\Middleware;

use auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {


    if($request->expectsJson()){
        return null;
    }
    if($this->auth->guard('customerGuard')->check()===false){
    notify()->info('You need to log in first');
    return route('customer.login');
    }
    return route('admin.login');
}


}
