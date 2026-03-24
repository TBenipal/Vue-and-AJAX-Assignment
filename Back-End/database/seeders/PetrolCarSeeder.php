<?php

namespace Database\Seeders;

use App\Models\PetrolCar;
use Illuminate\Database\Seeder;

class PetrolCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PetrolCar::factory()->count(50)->create();
    }
}
