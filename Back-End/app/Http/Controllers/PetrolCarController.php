<?php

namespace App\Http\Controllers;

use App\Models\PetrolCar;
use Illuminate\Http\Request;

class PetrolCarController extends Controller
{
    public function index(Request $request) {
        $query = PetrolCar::query();

        //// 3 filters make, fuel_capacity, price
        if ($request->has('make')) {
            $query->where('make', 'like', '%' . $request->make . '%');
        }
        if ($request->has('max_fuel')) {
            $query->where('fuel_capacity', '<=', $request->max_fuel);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        return response()->json($query->get());
    }

    // Show a single car by id
    public function show(PetrolCar $petrol_car) {
        return $petrol_car;
    }

    public function store(Request $request) {
        $make = $request->input('make');
        $model = $request->input('model');
        $fuel = $request->input('fuel', 'Petrol'); // Default to Petrol
        $capacity = $request->input('fuel_capacity');
        $price = $request->input('price');

        $petrol_car = PetrolCar::create([
            'make' => $make,
            'model' => $model,
            'fuel' => $fuel,
            'fuel_capacity' => $capacity,
            'price' => $price,
        ]);

        $petrol_car->save();

        return $petrol_car;
    }

    public function update(Request $request, PetrolCar $petrol_car) {
        if ($request->has('make')) {
            $petrol_car->make = $request->input('make');
        }
        if ($request->has('model')) {
            $petrol_car->model = $request->input('model');
        }
        if ($request->has('fuel')) {
            $petrol_car->fuel = $request->input('fuel');
        }
        if ($request->has('fuel_capacity')) {
            $petrol_car->fuel_capacity = $request->input('fuel_capacity');
        }
        if ($request->has('price')) {
            $petrol_car->price = $request->input('price');
        }

        $petrol_car->save();

        return $petrol_car;
    }

    public function destroy(PetrolCar $petrol_car) {
        $petrol_car->delete();
        return true;
    }
}