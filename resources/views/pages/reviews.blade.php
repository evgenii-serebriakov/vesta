@php
    // dd($reviews);
@endphp
<x-app>
    <x-slot name="title">
        Отзывы
    </x-slot>

    <x-slot name="desc">Отзывы клиентов</x-slot>
   
    <section class="reviews uk-section">
        <div class="uk-container uk-position-relative">
            @if ($reviews && count($reviews) !== 0)
                <div class="grid-reviews uk-child-width-1-1 uk-grid-divider uk-child-width-1-3@m uk-child-width-1-2@s">
                    @foreach ($reviews as $item)
                        <div class="reviews__col">
                            <a 
                                class="reviews__link uk-inline" 
                                href="https://www.youtube-nocookie.com/embed/{{ $item->video }}" 
                                data-caption="{{ $item->title }}" 
                                data-type="iframe"
                            >
                                <img class="reviews__image" src="{{ $item->image }}" alt="{{ $item->alt }}" />
                            </a>
                        </div>
                    @endforeach
                </div>
            
            @else
                <div class="reviews__empty">
                    <h2 class="uk-text-uppercase uk-text-center uk-text-muted">
                        Список отзывов пуст
                    </h2>
                </div>
            @endif
    
            {{-- <x-spinner class="uk-position-absolute" /> --}}
        </div>
    </section>
</x-app>
