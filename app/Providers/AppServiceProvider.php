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
                    'app.name'                                      => $settings['app_name'] ?? null,
                    'app.settings.app_logo'                         => $settings['app_logo'] ?? null,
                    'app.settings.app_logo_white'                   => $settings['app_logo_white'] ?? null,
                    'app.settings.admin_email'                      => $settings['admin_email'] ?? null,
                    'app.settings.contact_email'                    => $settings['contact_email'] ?? null,
                    'app.settings.copyright_text'                   => $settings['copyright_text'] ?? null,
                    'app.settings.app_environment'                  => $settings['app_environment'] ?? null,
                    'app.settings.stripe_test_publishable_key'      => $settings['stripe_test_publishable_key'] ?? null,
                    'app.settings.stripe_test_secret_key'           => $settings['stripe_test_secret_key'] ?? null,
                    'app.settings.stripe_live_publishable_key'      => $settings['stripe_live_publishable_key'] ?? null,
                    'app.settings.stripe_live_secret_key'           => $settings['stripe_live_secret_key'] ?? null,
                ]);
                if (config('app.settings.app_environment') === "live") {
                    config([
                        'app.settings.stripe_publishable_key'      => $settings['stripe_live_publishable_key'] ?? null,
                        'app.settings.stripe_secret_key'           => $settings['stripe_live_secret_key'] ?? null,
                        'services.reseller.api_url'                => config('services.reseller.live_api_url'),
                        'services.reseller.api_key'                => config('services.reseller.live_api_key'),
                        'services.reseller.customer_id'            => config('services.reseller.live_customer_id'),
                    ]);
                } else {
                    config([
                        'app.settings.stripe_publishable_key'      => $settings['stripe_test_publishable_key'] ?? null,
                        'app.settings.stripe_secret_key'           => $settings['stripe_test_secret_key'] ?? null,
                        'services.reseller.api_url'                => config('services.reseller.test_api_url'),
                        'services.reseller.api_key'                => config('services.reseller.test_api_key'),
                        'services.reseller.customer_id'            => config('services.reseller.test_customer_id'),
                    ]);
                }
            }
        }

    }
}
