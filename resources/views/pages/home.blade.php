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
        
        <x-home.home-banner />

        <x-home.home-post-preview :posts="$posts" :sprites="$sprites" />

        <x-home.home-services />

        <x-home.home-massage />
            
    </div>
</x-app>
