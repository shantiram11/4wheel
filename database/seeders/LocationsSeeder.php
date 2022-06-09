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
                'latitude'                      => 26.663552,
                'longitude'                     => 87.273414,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.643884,
                'longitude'                     => 87.275220,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.663552,
                'longitude'                     => 87.663552,
                'vehicle_id'                    =>2,
            ],
            [
                'latitude'                      => 26.663552,
                'longitude'                     => 87.663552,
                'vehicle_id'                    =>2,
            ],
        ],[],[]);
    }
}
