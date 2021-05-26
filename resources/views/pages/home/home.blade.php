<x-app>
    <x-slot name="title">
        Веста
    </x-slot>
    <x-slot name="desc">Центр реабилитации</x-slot>
    <ul>
        @foreach ($list as $key => $item)
            <li>{{ $key }}: {{ $item }}</li>
        @endforeach
    </ul>
</x-app>
