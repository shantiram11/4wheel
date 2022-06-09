<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $wishlist_vehicles_arr = [];
        if(auth()->check()) {
            $wishlist_vehicles_arr = DB::table('wishlists')->where('user_id', auth()->user()->id)->pluck('vehicle_id')->toArray();
        }
        \View::share('GLOBAL_WISHLIST_VEHICLE_ARR',$wishlist_vehicles_arr);
        return $next($request);

    }
}
