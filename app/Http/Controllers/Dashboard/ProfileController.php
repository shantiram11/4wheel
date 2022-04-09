<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();
        return view('dashboard.profiles.index',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Store(Request  $request)
    {
        $request->validate([
            'name'=> ['required','string','min:3','max:30']
        ]);
        $user = Auth::User();
        $user->name = $request->input('name');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->route('profile.index')->with('successMessage','Successfully Updated!!');
    }
    public function getChangePassword()
    {
        return view('dashboard.profiles.password');
    }

    public static function changePassword(PasswordRequest $request){

        $user= auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->updated_at = now();
        $user->save();
        return redirect()->route('profile.changePassword')->with('successMessage','Password Succesfully Changed!!');
    }

}
