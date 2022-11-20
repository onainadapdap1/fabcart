<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserMiddleware
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
        // Auth::check() calls Auth::user(), gets the result from it, and then checks to see if the user exists.
        // public function check()
        // {
        //     return ! is_null($this->user());
        // }
        if(Auth::check() && Auth::user()->isban) {
            $banned = Auth::user()->isban == "1";
            Auth::logout();
            if($banned == 1) {
                $message = "Your account has been banned. please contact administrator";
            }

            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email'=>'Your account has been banned. please contact administrator']);
        }
        if(Auth::check()) {
            $expiredAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiredAt);
        }
        return $next($request);
    }
}
