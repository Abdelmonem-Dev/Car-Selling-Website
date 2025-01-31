<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Model;
use App\Models\Maker;
use App\Models\State;


use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarDetailsRequest;
use App\Http\Requests\SearchRequest;
use App\Models\CarType;
use App\Models\FuelType;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Find the user with ID 1
        $user = User::find(3);

        // Check if the user exists
        if (!$user) {
            // Handle the case where the user doesn't exist
            return redirect()->route('home')->with('error', 'User not found.');
        }

        // Fetch the user's cars with relationships
        $cars = $user->cars()
            ->with(['primaryImage', 'maker', 'model'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Return the view with the cars data
        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        $makers = Maker::all();
        $states = State::all();
        $years =range(1900, date('Y'));
        return view('car.create', compact('makers', 'states', 'years'));
    }

    // CityController.php
public function getCitiesByState($stateId)
{
    // Retrieve cities for the selected state
    $cities = City::where('state_id', $stateId)->get();

    // Return cities as JSON
    return response()->json($cities);
}
public function getModelsByMaker($makerId)
{
    // Retrieve cities for the selected state
    $Models = Model::where('maker_id', $makerId)->get();

    // Return cities as JSON
    return response()->json($Models);
}

public function createCar(CarDetailsRequest $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('home')->with('error', 'User not found.');
    }
    // Validate the request and get the validated data
    $validated = $request->validated();

    // Create new car record
    $car = new Car();
    $car->user_id = Auth::user()->id;
    $car->maker_id = $validated['maker'];
    $car->model_id = $validated['model'];
    $car->city_id = $validated['city'];
    $car->car_type_id = $validated['car_type'];
    $car->fuel_type_id = $validated['fuel_type'];
    $car->price = $validated['price'];
    $car->year = $validated['year'];
    $car->vin = $validated['vin_code'];
    $car->address = $validated['address'];
    $car->phone = $validated['phone'];

    $car->mileage = $validated['mileage'];
    $car->description = $validated['description'];
    $car->published_at = ($validated['published'] ?? null) ? now() : null;
    $car->save();
$carId = $car->id;
$car->features()->create([
    'car_id' => $carId,
    'abs' => $validated['features']['abs'] ?? 0,
    'air_conditioning' => $validated['features']['air_conditioning'] ?? 0,
    'power_windows' => $validated['features']['power_windows'] ?? 0,
    'power_door_locks' => $validated['features']['power_door_locks'] ?? 0,
    'cruise_control' => $validated['features']['cruise_control'] ?? 0,
    'bluetooth_connectivity' => $validated['features']['bluetooth_connectivity'] ?? 0,
    'remote_start' => $validated['features']['remote_start'] ?? 0,
    'gps_navigation' => $validated['features']['gps_navigation'] ?? 0,
    'heated_seats' => $validated['features']['heated_seats'] ?? 0,
    'climate_control' => $validated['features']['climate_control'] ?? 0,
    'rear_parking_sensors' => $validated['features']['rear_parking_sensors'] ?? 0,
    'leather_seats' => $validated['features']['leather_seats'] ?? 0,
]);

    // Process the images if provided
    if (!empty($validated['images']) && is_array($validated['images'])) {
        $images = [];
        foreach ($validated['images'] as $image) {
            // Validate and store the image
            $path = $image->store('car_images', 'public');

            // Store image data in the correct format for createMany
            $images[] = [
                'car_id' => $carId ,
                'image_path' => $path,
                'position' => 1,
            ];
        }

        // Attach images to the car
        $car->images()->createMany($images);
    } else {
        // Handle the error or provide a fallback if no images are provided
        return back()->withErrors(['images' => 'Please provide valid image data.']);
    }

    // Redirect with success message
    return redirect()->route('car')->with('success', 'Car details added successfully.');
}




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('car.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car, $car_id)
    {

        $car = Car::where('id', $car_id)
            ->with(['primaryImage','city','carType','fuelType','maker','model','features'])
            ->first();
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
    public function search()
    {
        $query = Car::where('published_at', '<', now())
            ->with(['primaryImage','city','carType','fuelType','maker','model'])
            ->orderBy('published_at', 'desc');

            $cars = $query->paginate(12);

            $makers = Maker::all();
            $states = State::all();
            $fuelTypes = FuelType::all();
            $carTypes = CarType::all();

        return view('car.search',['cars' => $cars, 'makers' => $makers, 'states' => $states, 'fuelTypes' => $fuelTypes, 'carTypes' => $carTypes]);
    }

    public function searchAction(SearchRequest $request)
    {
        // Validate the request (validation is already handled by the SearchRequest class)
        $validated = $request->validated();

        // Initialize query builder for Car
        $cars = Car::query();

        // Apply filters to the query based on the provided input fields

        // Year filter
        if ($request->filled('year_from')) {
            $cars->where('year', '>=', $request->year_from);
        }

        if ($request->filled('year_to')) {
            $cars->where('year', '<=', $request->year_to);
        }

        // Price filter
        if ($request->filled('price_from')) {
            $cars->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $cars->where('price', '<=', $request->price_to);
        }

        // Maker filter
        if ($request->filled('maker')) {
            $cars->where('maker_id', $request->maker);
        }

        // Fuel type filter
        if ($request->filled('fuel_type_id')) {
            $cars->where('fuel_type_id', $request->fuel_type_id);
        }

        // Model filter (assuming you have the `model_id` in your database)
        if ($request->filled('model')) {
            $cars->where('model_id', $request->model);
        }

        // City filter (assuming you have a `city_id` in your Car model)
        if ($request->filled('city')) {
            $cars->where('city_id', $request->city);
        }

        // Get the search results
        $cars = $cars->paginate(12);

        $makers = Maker::all();
            $states = State::all();
            $fuelTypes = FuelType::all();
            $carTypes = CarType::all();
        // Return the results to the view
        return view('car.search', compact('cars'), ['makers' => $makers, 'states' => $states, 'fuelTypes' => $fuelTypes, 'carTypes' => $carTypes]);
    }


    public function watchlist(){

        $user = User::find(Auth::user()->id);

                // Check if the user exists
        if (!$user) {
                // Handle the case where the user doesn't exist
                return redirect()->route('home')->with('error', 'User not found.');
            }

        $cars = $user
            ->favouriteCars()
            ->with(['primaryImage','city','carType','fuelType','maker','model'])
            ->paginate(9);

        return view('car.watchlist', ['cars' => $cars]);
    }
}
