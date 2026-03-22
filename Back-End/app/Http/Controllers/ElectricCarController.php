<?php

namespace App\Http\Controllers;

use App\Models\ElectricCar;
use Illuminate\Http\Request;

class ElectricCarController extends Controller
{
    public function index(Request $request) {
        $query = ElectricCar::query();

        // 3 filters make, fuel_capacity, price
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
    public function show(ElectricCar $electric_car) {
        return $electric_car;
    }

    // Create new car
    public function store(Request $request) {

        //Capture inputs from the request
        $make = $request->input('make');
        $model = $request->input('model');
        $fuel = $request->input('fuel', 'Electric');
        $battery = $request->input('fuel_capacity');
        $price = $request->input('price');

        //Make the object in process
        $electric_car = ElectricCar::make([
            'make' => $make,
            'model' => $model,
            'fuel' => $fuel,
            'fuel_capacity' => $battery,
            'price' => $price,
        ]);

        //Save the object to the database
        $electric_car->save();

        //Return the object
        return $electric_car;
    }

    //Update the data in database for electric cars
    public function update(Request $request, ElectricCar $electric_car) {
        
        // Check if the database car has make
        if ($request->has('make')) {
            $electric_car->make = $request->input('make');
        }

        // Check if the database car has model
        if ($request->has('model')) {
            $electric_car->model = $request->input('model');
        }

        // Check if the database car has fuel
        if ($request->has('fuel')) {
            $electric_car->fuel = $request->input('fuel');
        }

        // Check if the database car has fuel capacity
        if ($request->has('fuel_capacity')) {
            $electric_car->fuel_capacity = $request->input('fuel_capacity');
        }

        // Check if the database car has price
        if ($request->has('price')) {
            $electric_car->price = $request->input('price');
        }

        // Save the changes to the db
        $electric_car->save();

        return $electric_car;
    }

    //Delete the car
    public function destroy(ElectricCar $electric_car) {
        $electric_car->delete();
        return true;
    }
}
