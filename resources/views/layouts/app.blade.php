@props(['title' => '', 'footerLinks' => ''])
<x-base-layout :$title>

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






