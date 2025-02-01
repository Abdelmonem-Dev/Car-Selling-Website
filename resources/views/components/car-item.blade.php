@props(['car', 'isInWatchlist' => false])

<div class="car-item card" id="car-{{$car->id}}">
    <a href="{{ route('car.show', $car) }}">
        <img src="{{ asset(optional($car->primaryImage)->image_path ?? 'default-image-path.jpg') }}"
        alt=""
             class="car-item-img rounded-t"
             loading="lazy"/>
    </a>
    <div class="p-medium">
        <div class="flex items-center justify-between">
            <small class="m-0 text-muted">{{$car->city->name}}</small>
            <x-like-button :$car :isInWatchlist="$car->favouredUsers->contains(auth()->user())" />
        </div>
        <h2 class="car-item-title">{{$car->year}} - {{$car->maker->name}} {{$car->model->name}}</h2>
        <p class="car-item-price">${{$car->price}}</p>
        <hr />
        <p class="m-0">
            <span class="car-item-badge">{{$car->carType->name}}</span>
            <span class="car-item-badge">{{$car->fuelType->name}}</span>
        </p>
    </div>
</div>

