<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            CategorySeeder::class,
            VehicleSeeder::class,
            PhotosSeeder::class,
            SettingsSeeder::class,
            LocationsSeeder::class,
        ]);
    }
}
