<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::upsert([
            [
                'latitude'                      => 26.709510257035596,
                'longitude'                     =>  87.29112207707969,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.7101145318668,
                'longitude'                     => 87.28665300351341,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.70881463683629,
                'longitude'                     => 87.27776680240497,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.663447546959773,
                'longitude'                     => 87.27454519980193,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.663705884259812,
                'longitude'                     => 87.27740536858143,
                'vehicle_id'                    =>2,
            ],
        ],[],[]);
    }
}
