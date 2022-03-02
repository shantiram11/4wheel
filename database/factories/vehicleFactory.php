<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class vehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'company_name'     => $this->faker->unique()->name(),
                'fuel_type'        => $this->faker->name(),
                'vehicle_number'   => $this->faker->word(),
                'brand'            => $this->faker->word(),
                'seat_count'       => $this->faker->word(),
                'description'      => $this->faker->word(),
                'vehicle_type'     => $this->faker->word(),
                'rate'             => $this->faker->word(),
                'location'         => $this->faker->word(),
                'model'            => $this->faker->word(),
                'status'           => $this->faker->word(),
                'owner_id'         =>1,

            ];

//        $factory->define(App\Vehicle::class, function (Faker $faker) {
//
//            $faker->addProvider(new \Faker\Provider\Fakecar($faker));
//            $v = $faker->vehicleArray();
//
//            return [
//                'vehicle_type'      => 'car',
//                'vin'               => $faker->vin,
//                'registration_no'   => $faker->vehicleRegistration,
//                'type'              => $faker->vehicleType,
//                'fuel'              => $faker->vehicleFuelType,
//                'brand'             => $v['brand'],
//                'model'             => $v['model'],
//                'year'              => $faker->biasedNumberBetween(1998,2017, 'sqrt'),
//            ];
//        });
    }
}
