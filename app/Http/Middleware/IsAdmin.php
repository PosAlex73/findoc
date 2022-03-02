<?php

namespace App\Http\Middleware;

use App\Enums\User\UserTypes;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!empty($user) && in_array($user->type, UserTypes::getAdminTypes())) {
            return $next($request);
        }

        return redirect(route(RouteServiceProvider::HOME));
    }
}
