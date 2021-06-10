@php
    // dd($post);
    // dd(Date)
@endphp

<x-app>
    <x-slot name="title">{{ $post->title }}</x-slot>

    <x-slot name="desc">{{ $post->message }}</x-slot>
   
    <section class="post uk-section uk-position-relative">
        @if ($post !== null)
            <article class="uk-article">
                <div class="uk-container uk-container-small">
                    <div class="uk-flex uk-flex-wrap uk-flex-center">
                        @if (check_image($post->image))
                            <div class="uk-width-1-1">
                                <div class="post__image">
                                    <img src="{{ $post->image }}" alt="{{ $post->alt }}" />
                                </div>
                            </div>
                        @endif
                        <div class="uk-width-1-1">
                            <div class="uk-card uk-card-default uk-card-hover">
                                <div class="uk-card-body">
                                    <h2 class="post__caption uk-text-uppercase uk-margin-remove decorating-line">
                                        {{ $post->title }}
                                    </h2>
                                    <p class="post__meta-info uk-text-meta">
                                        <time 
                                            class="uk-text-capitalize" 
                                            datetime="{{ $post->updated_at }}" 
                                            aria-label="Date of publication"
                                        >
                                            {{ Date::parse($post->updated_at)->format('F j, Y') }}
                                        </time>
                                    </p>
                                    <p class="post__message uk-text-break">{{ $post->message }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </article>
        @else
            <x-spinner class="uk-position-absolute" />
        @endif
    </section>
</x-app>