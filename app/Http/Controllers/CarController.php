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
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Find the user with ID 1
        $user = Auth::user();

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
     // Process and store the images if provided
     if (!empty($validated['images']) && is_array($validated['images'])) {
        $images = [];
        $position = 1;
        foreach ($validated['images'] as $image) {
            // Generate a unique file name and store the image in the public directory
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('car_images'), $imageName); // Store the image in public/car_images

            // Save the image path to the database
            $images[] = [
                'car_id'     => $car->id,
                'image_path' => 'storage/' . $imageName, // Store the relative path
                'position'   => $position, // Adjust position as needed
            ];
            $position++;
        }

        // Save the image records to the database
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
    public function edit($car_id)
{
    $car = Car::with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model', 'features'])
              ->where('id', $car_id)
              ->firstOrFail();

    // Ensure the authenticated user owns the car
    if (Auth::id() !== $car->user_id) {
        return redirect()->route('car')->with('error', 'Unauthorized access.');
    }

    // Fetch necessary data for the edit form
    $makers = Maker::all();
    $states = State::all();
    $years = range(1900, date('Y'));

    return view('car.edit', compact('car', 'makers', 'states', 'years'));
}

public function editCar(CarDetailsRequest $request, $car_id)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('home')->with('error', 'User not found.');
    }

    // Validate the request
    $validated = $request->validated();

    // Find the car and ensure it exists
    $car = Car::find($car_id);
    if (!$car) {
        return redirect()->route('car')->with('error', 'Car not found.');
    }

    // Ensure the authenticated user owns the car
    if (Auth::id() !== $car->user_id) {
        return redirect()->route('car')->with('error', 'Unauthorized access.');
    }

    // Update the car details
    $car->update([
        'maker_id' => $validated['maker'],
        'model_id' => $validated['model'],
        'city_id' => $validated['city'],
        'car_type_id' => $validated['car_type'],
        'fuel_type_id' => $validated['fuel_type'],
        'price' => $validated['price'],
        'year' => $validated['year'],
        'vin' => $validated['vin_code'],
        'address' => $validated['address'],
        'phone' => $validated['phone'],
        'mileage' => $validated['mileage'],
        'description' => $validated['description'],
        'published_at' => $validated['published'] ?? null ? now() : null,
        'updated_at' => now(),
    ]);
    // Update the car features if the relationship exists
    if ($car->features()->exists()) {
        $car->features()->update([
    'car_id' => $car_id,
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
    }

    return redirect()->route('car')->with('success', 'Car details updated successfully.');
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
    public function destroy($car_id)
    {
        $car = Car::find($car_id);

        // Ensure the authenticated user owns the car
        if (Auth::id() !== $car->user_id) {
            return redirect()->route('car')->with('error', 'Unauthorized access.');
        }

        // Delete the car
        $car->delete();

        // Redirect with success message
        return redirect()->route('car')->with('success', 'Car deleted successfully.');
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

    public function showCarImages($car_id)
{
    // Fetch the car with images and ensure it's an actual model instance
    $car = Car::with('images')->where('id', $car_id)->first();

    // Check if car exists
    if (!$car) {
        return redirect()->route('car')->with('error', 'Car not found.');
    }

    // Ensure the authenticated user owns the car
    if (Auth::id() !== $car->user_id) {
        return redirect()->route('car')->with('error', 'Unauthorized access.');
    }

    // Return view with car data
    return view('car.carImages', compact('car'));
}
public function updateCarImages(Request $request) {
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('home')->with('error', 'User not found.');
    }

    // Validate input
    $validated = $request->validate([
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'positions' => 'nullable|array',
        'positions.*' => 'integer|min:1',
        'delete_images' => 'nullable|array',
        'delete_images.*' => 'integer|exists:car_images,id',
    ]);

    // Handle image deletions
    if ($request->has('delete_images')) {
        \App\Models\CarImage::whereIn('id', $request->delete_images)->delete();
    }

    // Update positions
    if ($request->has('positions')) {
        foreach ($request->positions as $imageId => $position) {
            \App\Models\CarImage::where('id', $imageId)->update(['position' => $position]);
        }
    }

    return redirect()->back()->with('success', 'Car images updated successfully.');
}


public function uploadCarImages(Request $request, $car_id)
{
    $validated = $request->validate([
        'images' => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();
    $car = $user->cars->where('id', $car_id)->first();

    if (!$car) {
        return redirect()->back()->with('error', 'Car not found.');
    }

    // Process and store the images
    if (!empty($validated['images']) && is_array($validated['images'])) {
        $images = [];
        $position = \App\Models\CarImage::where('car_id', $car->id)->max('position') + 1;

        foreach ($validated['images'] as $image) {
            // Generate a unique filename
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the image to storage/app/public/car_images/
            $image->move(public_path('storage/car_images'), $imageName); // Store the image in public/car_images

            // Save the image path to the database
            $images[] = [
                'car_id'     => $car->id,
                'image_path' => 'storage/car_images/' . $imageName, // Correct path for retrieval
                'position'   => $position++,
            ];
        }

        // Bulk insert images into the database
        $car->images()->createMany($images);
    } else {
        return back()->withErrors(['images' => 'Please provide valid image data.']);
    }

    return redirect()->back()->with('success', 'Images uploaded successfully.');
}

}
