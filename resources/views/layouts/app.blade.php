    @extends('layouts.clean')

    @include('layouts.partial.header')

    @section('childContent')
        @yield('content')

    @hasSection('footerLinks')
    @include('layouts.partial.footer')
    @endif

    @endsection




