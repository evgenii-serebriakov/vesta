@php
    // dd($video);
@endphp

<x-app>
    <x-slot name="title">{{ $video->title }}</x-slot>

    <x-slot name="desc">{{ $video->message }}</x-slot>
   
    <section class="single-video uk-section uk-position-relative">
        @if ($video !== null)
            <article class="uk-article">
                <div class="uk-container">
                    <div class="uk-flex uk-flex-wrap">
        
                        <div class="uk-width-1-1 uk-width-1-2@m">
                            <div class="single-video__box">
                                <iframe 
                                    class="single-video__frame"
                                    src="https://www.youtube-nocookie.com/embed/{{ $video->video }}" 
                                    width="100%" 
                                    height="315"
                                    title="YouTube video player" 
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen="allowfullscreen"
                                ></iframe>
                            </div>
                        </div>
        
                        <div class="uk-width-1-1 uk-width-1-2@m">
                            <div class="single-video__card uk-card uk-card-default uk-card-hover uk-margin">
                                <div class="uk-card-body">
                                    <h2 class="single-video__caption uk-card-title uk-text-uppercase">
                                        {{ $video->title }}
                                    </h2>
                                    <p class="single-video__meta-info uk-text-meta">
                                        <time
                                            class="uk-text-capitalize" 
                                            datetime="{{ $video->updated_at }}" 
                                            aria-label="Date of publication"
                                        >
                                            {{ Date::parse($video->updated_at)->format('F j, Y') }}
                                        </time>
                                    </p>
                                    <p class="single-video__text uk-text-break">
                                        {{ $video->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @endif
        {{-- <x-spinner class="uk-position-absolute" v-else="v-else" /> --}}
    </section>
</x-app>