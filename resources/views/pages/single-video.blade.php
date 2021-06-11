@php
    // dd($video);
@endphp

<x-app>
    <x-slot name="title">{{ $video->title }}</x-slot>

    <x-slot name="desc">{{ $video->message }}</x-slot>
   
    <h2>Single video</h2>
</x-app>