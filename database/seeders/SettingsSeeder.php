<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insertOrIgnore([
        [
            'key_name'                              => 'app_name',
            'key_value'                             => 'LocalHub',
            'type'                                  => 'text',
            'availability'                          => 'all',
            'created_at'                            => now(),
            'updated_at'                            => now()
        ],
            [
                'key_name'                              => 'admin_email',
                'key_value'                             => 'thesarojstha@gmail.com',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_test_publishable_key',
                'key_value'                             => null,
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_test_secret_key',
                'key_value'                             => null,
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],


        ]);
    }
}
