<?php

namespace App\Http\Responses;

use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $user = User::where('email',$request->email)->with('role')->first();
        if($user->isAdmin()){
            $destination = RouteServiceProvider::DASHBOARD;
        }else{
            $destination = RouteServiceProvider::HOME;
        }
        return redirect()->intended($destination);
    }
}
