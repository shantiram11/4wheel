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
                'brand'                      => 'Audi A3 2.0 TDI',
                'seat_count'                 => 4,
                'description'                => 'New car in fresh condition.',
                'location'                   =>'itahari',
                'vehicle_type'               =>'car',
                'rate'                       => 5500,
                'model'                      =>'2018',
                'status'                     =>'available',
                'owner_id'                   =>9,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
            'company_name'               => 'Mercedes',
            'slug'                       => 'audi',
            'fuel_type'                  => 'petrol',
            'vehicle_number'             => 'ko 1 ka 6545',
            'brand'                      => 'Mercedes-Benz C AMG',
            'seat_count'                 => 4,
            'description'                => 'New car in fresh condition.',
            'location'                   =>'itahari',
            'vehicle_type'               =>'car',
            'rate'                       => 4500,
            'model'                      =>'2018',
            'status'                     =>'available',
            'owner_id'                   =>8,
            'created_at'                 =>now(),
            'updated_at'                 =>now(),
        ],
            [
                'company_name'               => 'Volkswagen',
                'slug'                       => 'audi',
                'fuel_type'                  => 'petrol',
                'vehicle_number'             => 'ko 1 ka 6545',
                'brand'                      => 'VW Golf 7 1.6 TDI - DSG',
                'seat_count'                 => 4,
                'description'                => 'New car in fresh condition.',
                'location'                   =>'itahari',
                'vehicle_type'               =>'car',
                'rate'                       => 5600,
                'model'                      =>'2018',
                'status'                     =>'available',
                'owner_id'                   =>2,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'company_name'               => 'Skylark',
                'slug'                       => 'skylark',
                'fuel_type'                  => 'petrol',
                'vehicle_number'             => 'ko 1 ka 6545',
                'brand'                      => '1971 Buick Skylark GSX',
                'seat_count'                 => 4,
                'description'                => 'New car in fresh condition.',
                'location'                   =>'itahari',
                'vehicle_type'               =>'car',
                'rate'                       => 5500,
                'model'                      =>'2018',
                'status'                     =>'available',
                'owner_id'                   =>2,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
            'company_name'               => 'Lada',
            'slug'                       => 'vaz',
            'fuel_type'                  => 'petrol',
            'vehicle_number'             => 'ko 1 ka 6545',
            'brand'                      => 'Lada VAZ 2101',
            'seat_count'                 => 4,
            'description'                => 'New car in fresh condition.',
            'location'                   =>'itahari',
            'vehicle_type'               =>'car',
            'rate'                       => 2500,
            'model'                      =>'2018',
            'status'                     =>'available',
            'owner_id'                   =>6,
            'created_at'                 =>now(),
            'updated_at'                 =>now(),
        ],
            [
                'company_name'               => 'BMW',
                'slug'                       => 'bmw',
                'fuel_type'                  => 'petrol',
                'vehicle_number'             => 'ko 1 ka 6545',
                'brand'                      => 'BMW M4 2016',
                'seat_count'                 => 4,
                'description'                => 'New car in fresh condition.',
                'location'                   =>'itahari',
                'vehicle_type'               =>'car',
                'rate'                       => 3500,
                'model'                      =>'2018',
                'status'                     =>'available',
                'owner_id'                   =>4,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
        ],[],[]);
    }
}
