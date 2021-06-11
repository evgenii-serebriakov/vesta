@php
    // dd($videos);
@endphp

@if ($videos && count($videos) !== 0)
    <section class="videos">
        <div class="uk-container-large uk-margin-auto videos__inner">
            <div class="isoteric">
                <i class="isoteric__icon">
                    <svg class="isoteric__icon-svg">
                        <use xlink:href="{{ $sprites }}#icon-isoteric" />
                    </svg>
                </i>
            </div>
            <h2 class="videos__title uk-text-uppercase uk-text-bold decorating-line">
                Последние видео
            </h2>
            <div class="uk-slider-container-offset slider">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                    <ul class="slider__list uk-slider-items uk-child-width-* uk-child-width-1-2@s uk-child-width-1-3@m uk-grid">
                        @foreach ($videos as $item)
                            <li class="slider_list-item">
                                <article class="teasers uk-article uk-card">
                                    <a 
                                        class="teasers__link uk-display-block"
                                        href="{{ route('video.show', ['slug' => $item->slug]) }}"
                                    >
                                        <div class="teasers__image uk-card-media-top">
                                            <img src="{{ $item->image }}" alt="{{ $item->alt }}" />
                                        </div>
                                        <div class="teasers__body">
                                            <h5 class="teasers__title uk-card-title uk-text-uppercase">
                                                {{ $item->title }}
                                            </h5>
                                        </div>
                                    </a>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                    <a 
                        class="uk-position-center-left uk-position-small uk-hidden-hover" 
                        href="#"
                        uk-slidenav-previous="uk-slidenav-previous" 
                        uk-slider-item="previous"
                    ></a>
                    <a
                        class="uk-position-center-right uk-position-small uk-hidden-hover" 
                        href="#"
                        uk-slidenav-next="uk-slidenav-next" 
                        uk-slider-item="next"
                    ></a>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
            <div class="separator-line"></div>
        </div>
    </section>
@endif