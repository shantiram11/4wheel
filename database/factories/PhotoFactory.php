<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->randomElement(['car2.jpg','car2.jpg','car3.jpg','car4.jpg','car5.jpg','car6.jpg','car7.jpg','car8.jpg',]),
            'store_type' => 'perm',
            'featured' => 'yes',
            'vehicle_id'=> Vehicle::all()->random()->id,
        ];
    }
}
