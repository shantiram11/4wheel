<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Http\Requests\SettingRequest;
use DB;

class SettingController extends DashboardController
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }


    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        parent::__construct();
//        $this->middleware('isAdmin');
//    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $settings = Setting::all();
        $stripe_environments = Setting::STRIPE_ENVIRONMENT;
        $app_environments = ['test', 'live'];
        return view('dashboard.settings.index', compact('settings','stripe_environments', 'app_environments'));
    }

    public function store(SettingRequest $request)
    {
        $settings = Setting::all();
        DB::transaction(function () use ($request, $settings) {

            $app_logo = $settings->where('key_name', 'app_logo')->first()->key_value;
            if ($request->hasFile('app_logo')) {
                @unlink(public_path('storage/uploads/settings/' . $app_logo));
                $imageName = AppHelper::renameImageFileUpload($request->file('app_logo'));
                $request->file('app_logo')->storeAs(
                    'public/uploads/settings', $imageName
                );
                $app_logo = $imageName;
            }

            $app_logo_white = $settings->where('key_name', 'app_logo_white')->first()->key_value;
            if ($request->hasFile('app_logo_white')) {
                @unlink(public_path('storage/uploads/settings/' . $app_logo_white));
                $image_name = AppHelper::renameImageFileUpload($request->file('app_logo_white'));
                $request->file('app_logo_white')->storeAs(
                    'public/uploads/settings', $image_name
                );
                $app_logo_white = $image_name;
            }

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
                    'key_name' => 'contact_email',
                    'key_value' => $request->input('contact_email') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'copyright_text',
                    'key_value' => $request->input('copyright_text') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'app_environment',
                    'key_value' => $request->input('app_environment') ?? null,
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
                [
                    'key_name' => 'stripe_live_publishable_key',
                    'key_value' => $request->input('stripe_live_publishable_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'stripe_live_secret_key',
                    'key_value' => $request->input('stripe_live_secret_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'app_logo',
                    'key_value' => $app_logo,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'app_logo_white',
                    'key_value' => $app_logo_white,
                    'updated_at' => now()
                ],
            ], ['key_name'], ['key_value', 'updated_at']);

            //updating settings cached value
            Setting::updateCachedSettingsData();

        });

        return redirect()->back()->with('alert.success', 'Setting Successfully Updated !!');

    }


    /**
     * Show the form for editing the specified resource.
     * @param Setting $setting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Setting $setting)
    {
        $stripe_environments = Setting::STRIPE_ENVIRONMENT;
        return view('dashboard.settings.edit', compact('setting', 'stripe_environments'));
    }

    /**
     * Update the specified resource in storage.
     * @param SettingRequest $request
     * @param Setting $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingRequest $request, Settings $setting)
    {


       DB::transaction(function () use ($request, $setting) {

            if ($request->hasFile('app_logo')) {
                @unlink(public_path('storage/uploads/settings/' . $setting->app_logo));
                $imageName = AppHelper::renameImageFileUpload($request->file('app_logo'));
                $request->file('app_logo')->storeAs(
                    'public/uploads/settings', $imageName
                );
                $setting->app_logo = $imageName;
            }
            if ($request->hasFile('app_logo_white')) {
                @unlink(public_path('storage/uploads/settings/' . $setting->app_logo_white));
                $image_name = AppHelper::renameImageFileUpload($request->file('app_logo_white'));
                $request->file('app_logo_white')->storeAs(
                    'public/uploads/settings', $image_name
                );
                $setting->app_logo_white = $image_name;
            }
            $setting->app_name = $request->input('app_name');
            $setting->admin_email = $request->input('admin_email');
            $setting->stripe_environment = $request->input('stripe_environment') ?? 'test';
            $setting->stripe_test_publishable_key = $request->input('stripe_test_publishable_key');
            $setting->stripe_test_secret_key = $request->input('stripe_test_secret_key');
            $setting->stripe_live_publishable_key = $request->input('stripe_live_publishable_key');
            $setting->stripe_live_secret_key = $request->input('stripe_live_secret_key');
            $setting->save();
        });
        return redirect()->route('settings.index')->with('alert.success', 'Setting Successfully Updated !!');
    }
}
