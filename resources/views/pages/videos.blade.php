@php
    // dd($videos);
@endphp
<x-app>
    <x-slot name="title">Видео</x-slot>

    <x-slot name="desc">Последние видео</x-slot>
   
    <section class="video uk-section">
        <div class="uk-container uk-position-relative">
            @if ($videos && count($videos) !== 0)   
                <div class="grid uk-child-width-1-1 uk-grid-divider uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s">
                    @foreach ($videos as $item)
                        <div class="video__col">
                            <article class="teaser uk-article uk-card">
                                <a 
                                    class="teaser__link uk-display-block"
                                    href="{{ route('video.show', ['slug' => $item->slug]) }}"
                                >
                                    <div class="teaser__image uk-card-media-top">
                                        <img src="{{ $item->image }}" alt="{{ $item->alt }}" />
                                    </div>
                                    <div class="teaser__body">
                                        <h5 class="teaser__title uk-card-title uk-text-uppercase">
                                            {{ $item->title }}
                                        </h5>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>

            @else
                <div class="video__empty">
                    <h2 class="uk-text-uppercase uk-text-center uk-text-muted">
                        Список видео пуст
                    </h2>
                </div>
            @endif
            {{-- <x-spinner class="uk-position-absolute" /> --}}
        </div>
    </section>
</x-app>