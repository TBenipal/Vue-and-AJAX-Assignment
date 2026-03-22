<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ElectricCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // I used help of AI to use this faker.js to fill the data with vehicles so I installed
        //a new composer package. I used this because it had the vehcile information
        $this->faker->addProvider(new \Faker\Provider\FakeCar($this->faker));

        //Random Electric Vehicle
        return [
            'make' => $this->faker->vehicleBrand(),
            'model' => $this->faker->vehicleModel(),
            'fuel' => 'Electric',
            'fuel_capacity' => $this->faker->numberBetween(50, 100),
            'price' => $this->faker->numberBetween(50000, 500000)
        ];
    }
}
