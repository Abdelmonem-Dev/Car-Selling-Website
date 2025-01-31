@props(['makers',"states","fuelTypes","carTypes"])
<section class="find-a-car">
    <div class="container">
      <form
        action="{{ route('car.searchAction') }}"
        method="POST"
        class="find-a-car-form card flex p-medium"
      >
      @csrf

        <div class="find-a-car-inputs">
          <div>
            <select id="maker" name="maker">
                @forelse ($makers as $maker)
                <option value="{{$maker->id}}">{{$maker->name}}</option>
                @empty
                <option value="">No Makers</option>
                @endforelse
            </select>
          </div>
          <div>
            <select id="model" name="model">
            </select>
          </div>
          <div>
            <select id="state" name="state">
                @forelse ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @empty
                <option value="">No States</option>
                @endforelse
              </select>
          </div>
          <div>
            <select id="city" name="city">
            </select>
          </div>
          <div>
            <select name="car_type_id">
                @forelse ($carTypes as $carType)
                        <option value="{{$carType->id}}">{{$carType->name}}</option>
                        @empty
                        <option value="">No Car Types</option>
                        @endforelse
            </select>
          </div>
          <div>
            <input type="date" placeholder="Year From" name="year_from"  id="year_from"/>
          </div>
          <div>
            <input type="date" placeholder="Year To" name="year_to"  id="year_to"/>
          </div>
          <div>
            <input
              type="number"
              placeholder="Price From"
              name="price_from"  id="price_from"
            />
          </div>
          <div>
            <input type="number" placeholder="Price To" name="price_to"  id="price_to"/>
          </div>
          <div>
            <select name="fuel_type_id">
                @forelse ($fuelTypes as $fuelType)
                <option value="{{$fuelType->id}}">{{$fuelType->name}}</option>
                @empty
                <option value="">No fuel Types</option>
                @endforelse
            </select>
          </div>
        </div>
        <div>
          <button type="button" class="btn btn-find-a-car-reset">
            Reset
          </button>
          <button class="btn btn-primary btn-find-a-car-submit">
            Search
          </button>
        </div>
      </form>
    </div>
  </section>


