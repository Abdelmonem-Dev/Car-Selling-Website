<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@props(['title' => '','bodyClass'=> null, 'footerLinks' => ''])
<x-base-layout :$title :$bodyClass>

    <x-layouts.header/>

    {{$slot}}
    <footer>
        @Section('footerLinks')
            {{$footerLinks}}

            @show
    </footer>
</x-base-layout>






