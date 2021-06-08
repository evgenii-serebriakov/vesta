@php
    // dd(trim_message)
    // print(format_bytes(2048));
@endphp

<x-app>
    <x-slot name="title">Посты</x-slot>

    <x-slot name="desc">Последние посты</x-slot>

    <section class="posts uk-section">
        <div class="uk-container uk-position-relative">
            @if ($posts && count($posts) !== 0)

                <div class="grid uk-child-width-1-1 uk-grid-divider uk-grid-match uk-child-width-1-1@m">
                    @foreach ($posts as $post)
                        <div class="post__col" data-v-for="item in posts">
                            <article class="teaser uk-article article">
                                <a
                                    class="teaser__link uk-flex uk-flex-column uk-flex-wrap uk-card uk-card-default uk-card-hover"
                                    href="{{ route('single-post', ['slug' => $post->slug]) }}"
                                >
                                    <div class="teaser__item-wrap uk-card-media-top uk-width-1-1 uk-width-1-3@m" v-if="isImage(item.image)">
                                        <div class="teaser__link">
                                            <img class="teaser__img" src="{{ $post->image }}" alt="{{ $post->alt }}" />
                                        </div>
                                    </div>

                                    <div class="teaser__content uk-flex uk-flex-column uk-width-1-1 uk-width-2-3@m">
                                        <div class="teaser__header uk-card-headers">
                                            <h5
                                                class="teaser__title uk-card-title uk-text-normal uk-text-uppercase decorating-line"
                                            >
                                                {{ $post->title }}
                                            </h5>
                                            <p class="teaser__meta-info uk-text-meta">
                                                <time 
                                                    class="uk-text-capitalize" 
                                                    datetime="{{ $post->updated_at }}" 
                                                    aria-label="Date of publication"
                                                >
                                                    {{ Date::parse($post->updated_at)->format('F j, Y') }}
                                                </time>
                                            </p>
                                        </div>
                                        <div class="teaser__body uk-card-body uk-flex-1">
                                            <p class="teaser__desc uk-text-break">
                                                {{ Str::words($post->message, 15, '...') }}
                                            </p>
                                        </div>

                                        <div class="teaser__footer uk-card-footer">
                                            <span class="teaser__text uk-text-uppercase uk-text-middle">Далее</span>
                                            <i class="teaser__icon">
                                                <svg class="teaser__icon-svg">
                                                    <use xlink:href="{{ $sprites }}#icon-arrow-right" />
                                                </svg>
                                            </i>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
            
            @else
                <div class="posts__empty">
                    <h2 class="uk-text-uppercase uk-text-center uk-text-muted">
                        Список записей пуст
                    </h2>
                </div>
            @endif

            {{-- <x-spinner class="uk-position-absolute" /> --}}
        </div>
    </section>
</x-app>
