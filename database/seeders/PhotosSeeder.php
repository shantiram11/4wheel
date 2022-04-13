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
                'image'                      => '1.jpg',
                'store_type'                 => 'perm',
                'featured'                   => 'yes',
                'vehicle_id'                   =>1,
                'created_at'                 =>now(),
                'updated_at'                 =>now(),
            ]
        ],[],[]);

    }
}
