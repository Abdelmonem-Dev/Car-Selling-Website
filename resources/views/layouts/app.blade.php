@props(['title' => '','bodyClass'=> null, 'footerLinks' => ''])
<x-base-layout :$title :$bodyClass>

    <x-layouts.header/>

    {{$slot}}
    <footer>
        @Section('footerLinks')
            {{$footerLinks}}
            <a href="/about">3</a>
            <a href="/contact">4</a>
            @show
    </footer>
</x-base-layout>






