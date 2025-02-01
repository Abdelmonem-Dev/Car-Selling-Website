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
        <h1 class="car-details-page-title">Edit Car: Lexus NX200t - 2016</h1>
        <form action="{{route('car.editAction',$car->id)}}" method="POST" class="card add-new-car-form">
        @csrf

          <div class="form-content">
            <div class="form-details">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Maker</label>

                    <select id="maker" name="maker">
                        <option value="{{$car->maker_id}}">{{$car->maker->name}}</option>
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
                      <option value="{{$car->model_id}}">{{$car->model->name}}</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Year</label>
                   <select name="year">
                    <option value="{{$car->year}}">{{$car->year}}</option>
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
                        <input type="radio" name="car_type" value="1"
                        @if($car->carType->id === 1) checked @endif />
                      Sedan
                    </label>
                  </div>

                  <div class="col">
                    <label class="inline-radio">
                      <input type="radio" name="car_type" value="8"
                      @if($car->carType->id === 8) checked @endif/>
                      Hatchback
                    </label>
                  </div>

                  <div class="col">
                    <label class="inline-radio">
                      <input type="radio" name="car_type" value="2"
                      @if($car->carType->id === 2) checked @endif />
                      SUV (Sport Utility Vehicle)
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" placeholder="Price" name="price" value="{{$car->price}}"/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Vin Code</label>
                    <input placeholder="Vin Code" name="vin_code" value="{{$car->vin}}"/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Mileage (ml)</label>
                    <input placeholder="Mileage" name="mileage" value="{{$car->mileage}}"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Fuel Type</label>
                <div class="row">
                    <div class="col">
                        <label class="inline-radio">
                            <input type="radio" name="fuel_type" value="1" @checked($car->fuel_type_id === 1) />
                            Gasoline
                        </label>
                    </div>
                    <div class="col">
                        <label class="inline-radio">
                            <input type="radio" name="fuel_type" value="2" @checked($car->fuel_type_id === 2) />
                            Diesel
                        </label>
                    </div>
                    <div class="col">
                        <label class="inline-radio">
                            <input type="radio" name="fuel_type" value="3" @checked($car->fuel_type_id === 3) />
                            Electric
                        </label>
                    </div>
                    <div class="col">
                        <label class="inline-radio">
                            <input type="radio" name="fuel_type" value="4" @checked($car->fuel_type_id === 4) />
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
                        <option value="{{$car->city->state->id}}">{{$car->city->state->name}}</option>
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
                        <option value="{{$car->city->id}}">{{$car->city->name}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Address</label>
                    <input placeholder="Address" name="address" value="{{$car->address}}"/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Phone</label>
                    <input placeholder="Phone" name="phone" value="{{$car->phone}}"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="checkbox">
                            <input type="checkbox" name="features[air_conditioning]" value="1" @checked($car->features->air_conditioning) />
                            Air Conditioning
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[power_windows]" value="1" @checked($car->features->power_windows) />
                            Power Windows
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[power_door_locks]" value="1" @checked($car->features->power_door_locks) />
                            Power Door Locks
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[abs]" value="1" @checked($car->features->abs) />
                            ABS
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[cruise_control]" value="1" @checked($car->features->cruise_control) />
                            Cruise Control
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[bluetooth_connectivity]" value="1" @checked($car->features->bluetooth_connectivity) />
                            Bluetooth Connectivity
                        </label>
                    </div>
                    <div class="col">
                        <label class="checkbox">
                            <input type="checkbox" name="features[remote_start]" value="1" @checked($car->features->remote_start) />
                            Remote Start
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[gps_navigation]" value="1" @checked($car->features->gps_navigation) />
                            GPS Navigation System
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[heated_seats]" value="1" @checked($car->features->heated_seats) />
                            Heated Seats
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[climate_control]" value="1" @checked($car->features->climate_control) />
                            Climate Control
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[rear_parking_sensors]" value="1" @checked($car->features->rear_parking_sensors) />
                            Rear Parking Sensors
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="features[leather_seats]" value="1" @checked($car->features->leather_seats) />
                            Leather Seats
                        </label>
                    </div>
                </div>
            </div>

              <div class="form-group">
                <label>Detailed Description</label>
                <textarea rows="10" name="description">{{$car->description}}</textarea>
              </div>
              <div class="form-group">
                <label class="checkbox">
                  <input type="checkbox" name="published" value="1" @checked($car->published_at !== NULL) />
                  Published
                </label>
              </div>
            </div>
            <div class="form-images">
                <p class="my-large">
                    Manage your images
                    <a href="/car_images.html">From here</a>
                </p>

                <div class="car-form-images">
                    @foreach($car->images as $image)
                        <a class="car-form-image-preview">
                            <img src="{{ asset( $image->image_path) }}" alt="Car Image" />
                        </a>
                    @endforeach
                </div>
            </div>

          </div>
          <div class="p-medium" style="width: 100%">
            <div class="flex justify-end gap-1">
              <button type="button" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </main>

</x-app-layout>
