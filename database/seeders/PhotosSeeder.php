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
        Photo::upsert([
            [
                'image'                      => 'car.jpg',
                'store_type'                     => 'perm',
                'featured'         => 'yes',
                'vehicle_id'                   => 1,
            ]
        ],[],[]);
    }
}
