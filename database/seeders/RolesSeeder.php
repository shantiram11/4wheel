<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::upsert([
            [
                'name' => 'superAdmin',
                'label' => 'Super Admin',
                'description' => 'Super Admin can manage anything',
                'preserved' => 'yes',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin',
                'label' => 'Admin',
                'description' => 'Owner and could manage all data related to the inventory',
                'preserved' => 'yes',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'vendor',
                'label' => 'Vendor',
                'description' => 'User who is regsitered as a contributor',
                'preserved' => 'yes',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'customer',
                'label' => 'Customer',
                'description' => 'User who registered just for purchasing the services',
                'preserved' => 'yes',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ], ['name'], ['label','description','preserved','updated_at']);
    }
}
