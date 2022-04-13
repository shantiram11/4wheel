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
//        \App\Models\Vehicle::factory(20)->create();
        vehicle::upsert([
            [
                'company_name'               => 'Audi',
                'slug'                       => 'audi',
                'fuel_type'                  => 'petrol',
                'vehicle_number'             => 'ko 1 ka 6545',
                'brand'                      => 'Audi',
                'seat_count'                 => 4,
                'description'                => 'New car in fresh condition.',
                'location'                   =>'itahari',
                'vehicle_type'               =>'car',
                'rate'                       => 500,
                'model'                      =>'2018',
                'status'                     =>'available',
                'owner_id'                   =>1,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ]
        ],[],[]);
    }
}
