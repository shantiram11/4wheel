<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::pluck('key_value','key_name')->toArray();
        return view('dashboard.settings.index',compact('settings'));
    }

    public function update(Request $request){
        {

//            dd($request->all());
            $request->validate([
                'admin_email' => 'required|email',
                'app_name' => 'required|string|max:20',

            ]);
                Setting::upsert([
                    [
                        'key_name' => 'app_name',
                        'key_value' => $request->input('app_name') ?? null,
                        'updated_at' => now()
                    ],
                    [
                        'key_name' => 'admin_email',
                        'key_value' => $request->input('admin_email') ?? null,
                        'updated_at' => now()
                    ],
                    [
                        'key_name' => 'stripe_test_publishable_key',
                        'key_value' => $request->input('stripe_test_publishable_key') ?? null,
                        'updated_at' => now()
                    ],
                    [
                        'key_name' => 'stripe_test_secret_key',
                        'key_value' => $request->input('stripe_test_secret_key') ?? null,
                        'updated_at' => now()
                    ],
                ], ['key_name'] , ['key_value','updated_at']);

            return redirect()->back()->with('toast.successMsg','successfully updated');
        }
    }
}
