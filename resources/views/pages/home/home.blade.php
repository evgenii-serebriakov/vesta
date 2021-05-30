@php
    // dd($posts)   ;
@endphp

<x-app>
    <x-slot name="title">
        Веста
    </x-slot>

    <x-slot name="desc">Центр реабилитации</x-slot>
    
    <div>
        <nav>
            <a href="{{ route('home') }}">ГЛАВНАЯ</a>
            <a href="{{ route('posts') }}">ПОСТЫ</a>
        </nav>
        
        @foreach ($posts as $post)
            <h2>{{ $post->title }}</h2>
            <date>{{ $post->updated_at }}</date>
            <img src="{{ $post->image }}" alt="{{ $post->alt }}">
        @endforeach
    </div>
</x-app>
