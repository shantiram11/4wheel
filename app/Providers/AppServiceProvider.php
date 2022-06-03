<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

//        dd($this->cache_settings->get('app_name'));
        if (Schema::hasTable('settings')) {
            $settings = Setting::getCachedValue();
            if($settings){
                config([
                    'app.app_name'                                  => $settings['app_name'] ?? null,
                    'app.settings.admin_email'                      => $settings['admin_email'] ?? null,
                    'app.settings.stripe_test_publishable_key'      => $settings['stripe_test_publishable_key'] ?? null,
                    'app.settings.stripe_test_secret_key'           => $settings['stripe_test_secret_key'] ?? null,
                ]);
            }
        }

    }
}
