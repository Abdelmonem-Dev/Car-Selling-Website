<x-app-layout>
    <main>
        <!-- New Cars -->
        <section>
          <div class="container">
            <h2>My Favourite Cars</h2>
            <h4>Number of Favourite Cars: {{$cars->total()}}</h4>

            <div class="car-items-listing">
                @foreach ($cars as $car)
                <x-car-item :$car :isInWatchlist="true"/>
                @endforeach

            </div>
            {{ $cars->links() }}
          </div>
        </section>
        <!--/ New Cars -->
      </main>
</x-app-layout>
