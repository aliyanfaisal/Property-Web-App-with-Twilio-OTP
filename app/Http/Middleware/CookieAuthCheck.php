<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CookieAuthCheck
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

        $cookie_exists = Cookie::get("curr_user_verified");
        $cookie_user = json_decode(Cookie::get("curr_user"));


        if ($cookie_exists && ($cookie_user)) {
            $user = User::find($cookie_user->id);
            Auth::login($user);
            // dd(Cookie::get("curr_user_verified"));
            return $next($request);
        }

        return redirect()->route("property-home")->with(["message" => "You have to verify yourself to get access to this resource."]);
    }
}
