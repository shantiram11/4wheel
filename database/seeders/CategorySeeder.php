<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::upsert([
            [
                'name'                      => 'Car',
                'description'               => 'lorem ipsum lorem upsum lorem ipsum lorem ipsum',

            ],
            [
                'name'                      => 'jeep',
                'description'               => 'lorem ipsum lorem upsum lorem ipsum lorem ipsum',

            ],
            [
                'name'                      => 'Motorcycle',
                'description'               => 'lorem ipsum lorem upsum lorem ipsum lorem ipsum',

            ],
        ],['name'],[]);
    }
}
