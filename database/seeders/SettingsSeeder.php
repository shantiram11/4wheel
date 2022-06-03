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
            'key_value'                             => '4Wheel',
            'type'                                  => 'text',
            'created_at'                            => now(),
            'updated_at'                            => now()
        ],
            [
                'key_name'                              => 'admin_email',
                'key_value'                             => 'shantiramtiwari0852@gmail.com',
                'type'                                  => 'text',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_test_publishable_key',
                'key_value'                             => "pk_test_51KmJxlKcTuD99JLxTLOwsvOtLqShVjF5wJtxV8PXD4AeI4RjodyWDp7brNPoFCoO69KL2HVYErEZ8Epc5kqBILzq00xgxjhAbQ",
                'type'                                  => 'text',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_test_secret_key',
                'key_value'                             => "sk_test_51KmJxlKcTuD99JLxjxT6JAUsgXHrCYlxtOpAWrWP5mJDZxy3aQmtmgniNUJ5TXU9jFSWx2RuMq76lc7zG3KDRcbc004vPp6tlG",
                'type'                                  => 'text',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],


        ]);
    }
}
