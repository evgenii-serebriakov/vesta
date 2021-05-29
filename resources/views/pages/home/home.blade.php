@php
    // dd($posts);
@endphp

<x-app>
    <x-slot name="title">
        Веста
    </x-slot>

    <x-slot name="desc">Центр реабилитации</x-slot>
    
    <div>
        @foreach ($posts as $post)
            <h2>{{ $post->title }}</h2>
            <img src="{{ $post->image }}" alt="{{ $post->alt }}">
        @endforeach
    </div>
</x-app>
