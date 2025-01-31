<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<x-app-layout>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <x-message-error :message="$error" />
            @endforeach
        </ul>
    </div>
@endif
    <main>
        <div class="container-small">
          <h1 class="car-details-page-title">Add new car</h1>
          <form action="{{route('car.createCar')}}" method="post" enctype="multipart/form-data" class="card add-new-car-form">
            @csrf

            <div class="form-content">
              <div class="form-details">
                <div class="row">
                  <div class="col">

                    <div class="form-group">
                      <label>Maker</label>
                      <select id="maker" name="maker">
                        @forelse ($makers as $maker)
                        <option value="{{$maker->id}}">{{$maker->name}}</option>
                        @empty
                        <option value="">No Makers</option>
                        @endforelse
                      </select>
                      <p class="error-message">This field is required</p>
                    </div>
                  </div>
                  <div class="col">

                    <div class="form-group">
                      <label>Model</label>
                      <select id="model" name="model">
                      </select>
                    </div>

                  </div>
                  <div class="col">

                    <div class="form-group">
                      <label>Year</label>
                      <select name="year">
                        @forelse ($years as $year)

                        <option value="{{$year}}">{{$year}}</option>

                        @empty
                        <option value="">No Years</option>
                        @endforelse
                      </select>
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label>Car Type</label>
                  <div class="row">
                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="car_type" value="1" />
                        Sedan
                      </label>
                    </div>

                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="car_type" value="8" />
                        Hatchback
                      </label>
                    </div>

                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="car_type" value="2" />
                        SUV (Sport Utility Vehicle)
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">

                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" name="price" placeholder="Price" />
                    </div>

                  </div>
                  <div class="col">

                    <div class="form-group">
                      <label>Vin Code</label>
                      <input name="vin_code" placeholder="Vin Code" />
                    </div>

                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>Mileage (ml)</label>
                      <input name="mileage" placeholder="Mileage" />
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  <label>Fuel Type</label>
                  <div class="row">
                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="fuel_type" value="1" />
                        Gasoline
                      </label>
                    </div>
                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="fuel_type" value="2" />
                        Diesel
                      </label>
                    </div>
                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="fuel_type" value="3" />
                        Electric
                      </label>
                    </div>
                    <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="fuel_type" value="4" />
                        Hybrid
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">

                    <div class="form-group">
                      <label>State/Region</label>
                      <select id="state" name="state">
                        @forelse ($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @empty
                        <option value="">No States</option>
                        @endforelse
                      </select>
                    </div>

                  </div>
                  <div class="col">

                    <div class="form-group">
                        <label>City</label>
                            <select id="city" name="city">
                            </select>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col">

                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" placeholder="Address" />
                    </div>

                  </div>
                  <div class="col">

                    <div class="form-group">
                      <label>Phone</label>
                      <input name="phone" placeholder="Phone" />
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="features[air_conditioning]"
                          value="1"
                        />
                        Air Conditioning
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[power_windows]" value="1" />
                        Power Windows
                      </label>

                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="features[power_door_locks]"
                          value="1"
                        />
                        Power Door Locks
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[abs]" value="1" />
                        ABS
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[cruise_control]" value="1" />
                        Cruise Control
                      </label>

                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="features[bluetooth_connectivity]"
                          value="1"
                        />
                        Bluetooth Connectivity
                      </label>
                    </div>
                    <div class="col">
                      <label class="checkbox">
                        <input type="checkbox" name="features[remote_start]" value="1" />
                        Remote Start
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[gps_navigation]" value="1" />
                        GPS Navigation System
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[heated_seats]" value="1" />
                        Heated Seats
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[climate_control]" value="1" />
                        Climate Control
                      </label>

                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="features[rear_parking_sensors]"
                          value="1"
                        />
                        Rear Parking Sensors
                      </label>

                      <label class="checkbox">
                        <input type="checkbox" name="features[leather_seats]" value="1" />
                        Leather Seats
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Detailed Description</label>
                  <textarea rows="10" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label class="checkbox">
                        <input type="checkbox" name="published" value="1" />
                        Published
                      </label>
                </div>

              </div>
              <div class="form-images">
                <div class="form-image-upload">
                  <div class="upload-placeholder">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      style="width: 48px"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                      />
                    </svg>
                  </div>
                  <input id="carFormImageUpload" name="images[]" type="file" multiple />
                </div>
                <div id="imagePreviews" class="car-form-images"></div>
              </div>
            </div>
            <div class="p-medium" style="width: 100%">
              <div class="flex justify-end gap-1">
                <button type="button" class="btn btn-default">Reset</button>
                <button class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
    </main>

</x-app-layout>

