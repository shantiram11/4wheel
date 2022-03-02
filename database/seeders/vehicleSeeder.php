<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class vehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Vehicle::factory(20)->create();
//        vehicle::upsert([
//            [
//                'company_name'                       => 'Audi',
//                'vehicle_number'                     => 'shantiramtiwari0852@4wheel.test',
//                'brand'                              => 'Audi A3 2.0 TDI',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',
//                'featured_image'                     => '',//profile image
//            ]
//        ],[],[]);
    }
}
