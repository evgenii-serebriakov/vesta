@php
    // dd($post);

    function format_date($date)
    {
        return date('F j, Y, g:i a', strtotime($date));
       
        // $date = new DateTime($data);

        // return $date->format('F j, Y, g:i a');
    }

@endphp

<x-app>
    <x-slot name="title">
        Посты
    </x-slot>

    <x-slot name="desc">Страница постов</x-slot>
   
    <section class="post uk-section uk-position-relative">
        @if ($post !== null)
            <article class="uk-article">
                <div class="uk-container uk-container-small">
                    <div class="uk-flex uk-flex-wrap uk-flex-center">

                        <div class="uk-width-1-1" v-if="isImage(post->image)">
                            <div class="post__image">
                                <img src="{{ $post->image }}" alt="{{ $post->alt }}" />
                            </div>
                        </div>
                        
                        <div class="uk-width-1-1">
                            <div class="uk-card uk-card-default uk-card-hover">
                                <div class="uk-card-body">
                                    <h2 class="post__caption uk-text-uppercase uk-margin-remove decorating-line">
                                        {{ $post->title }}
                                    </h2>
                                    <p class="post__meta-info uk-text-meta">
                                        <time datetime="{{ $post->updated_at }}" aria-label="Date of publication">
                                            {{ format_date($post->updated_at) }}
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