<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\Photo::factory(20)->create();

        Photo::upsert([
            [
                'image'                      => '4.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>1,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '2.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>2,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '3.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>3,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '1.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>4,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '5.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>5,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '6.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>6,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ], [
                'image'                      => '6.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>1,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '5.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>2,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '4.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>3,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '3.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>4,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '2.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>5,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '1.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>6,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ], [
                'image'                      => '1.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>1,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '2.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>2,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '3.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>3,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '4.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>4,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '5.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>5,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => '6.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>6,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ]  ,
            [
            'image'                      => 'bike1.jpg',
            'store_type'                 => 'perm',
            'featured'                   => 'yes',
            'vehicle_id'                   =>7,
            'created_at'                 =>now(),
            'updated_at'                 =>now(),
        ],
            [
                'image'                      => 'bike2.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>7,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ],
            [
                'image'                      => 'bike3.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'no',
                'vehicle_id'                   =>7,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ]
        ],[],[]);

    }
}
