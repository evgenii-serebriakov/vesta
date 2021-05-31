@php
    // print($slug);
@endphp

<x-app>
    <x-slot name="title">
        Посты
    </x-slot>

    <x-slot name="desc">Страница постов</x-slot>
   
    <h2>Single post {{ $slug }}</h2>
</x-app>