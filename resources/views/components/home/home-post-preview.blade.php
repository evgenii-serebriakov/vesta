@php
    // dd($posts);
@endphp
<section class="posts">
    <div class="uk-container-large uk-margin-auto posts__inner">

        <div class="isoteric">
            <i class="isoteric__icon">
                <svg class="isoteric__icon-svg">
                    <use xlink:href="{{ $sprites }}#icon-isoteric" />
                </svg>
            </i>
        </div>

        <h2 class="posts__title uk-text-uppercase uk-text-bold decorating-line">
            Последние посты
        </h2>

        <div class="uk-slider-container-offset slider">
            @if ($posts && count($posts) !== 0)
    
                <div 
                    class="uk-position-relative uk-visible-toggle uk-light" 
                    tabindex="-1"
                >
                    <ul class="uk-slider-items uk-child-width-* uk-child-width-1-2@s uk-child-width-1-3@m uk-grid">

                        @foreach ($posts as $post)
                            <li>
                                <article class="teasers uk-article article">
                                    <a
                                        class="teasers__link uk-display-block uk-card uk-card-default uk-card-hover"
                                        href="{{ route('single-post', ['slug' => $post->slug]) }}"
                                        >
                                        <div class="teasers__item-wrap uk-card-media-top">
                                            <div class="teasers__link">
                                                <img
                                                    class="teasers__img" 
                                                    src="{{ $post->image }}"
                                                    alt="{{ $post->alt }}" 
                                                />
                                            </div>
                                        </div>

                                        <div class="teasers__content uk-card-body">
                                            <h5 class="teasers__title uk-card-title uk-text-normal uk-text-uppercase">
                                                {{ $post->title }}
                                            </h5>
                                            <p class="teasers__meta-info uk-text-meta">
                                                <time :datetime="item.updated_at" aria-label="Date of publication">
                                                    {{ $post->updated_at }}
                                                </time>
                                            </p>
                                        </div>

                                        <div class="teasers__footer uk-card-footer">
                                            <span
                                                class="teasers__text uk-text-uppercase uk-text-middle">
                                                Далее
                                            </span>
                                            <i
                                                class="teasers__icon">
                                                <svg class="teasers__icon-svg">
                                                    <use xlink:href="{{ $sprites }}#icon-arrow-right" />
                                                </svg>
                                            </i>
                                        </div>
                                    </a>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                    
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                        uk-slidenav-previous="uk-slidenav-previous" uk-slider-item="previous">
                    </a>
                    <a
                        class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                        uk-slidenav-next="uk-slidenav-next" uk-slider-item="next">
                    </a>
                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
            
            <div class="separator-line"></div>

        @endif
    </div>
</section>