<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetrolCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\FakeCar($this->faker));

        //Random Petrol Vehicles
        return [
            'make' => $this->faker->vehicleBrand(),
            'model' => $this->faker->vehicleModel(),
            'fuel' => 'Petrol',
            'fuel_capacity' => $this->faker->numberBetween(50, 100),
            'price' => $this->faker->numberBetween(50000, 500000)
        ];
    }
}
