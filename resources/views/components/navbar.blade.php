@php
    // dd($navigation); 
@endphp
<header class="header">
    <section class="header__secondary uk-padding-small uk-visible@m">
        <div class="uk-container">
            <div class="uk-flex uk-flex-center uk-flex-wrap uk-flex-between@m">
                <div class="uk-width-auto">
                    <div class="social-bar">
                        <ul class="social-bar__list uk-flex uk-flex-row uk-padding-remove-left">
                            @foreach ($social as $item)
                                <li class="social-bar__list-item">
                                    @if ($item->flag)
                                        <a
                                            class="social-bar__link" 
                                            href="{{ $item->path }}"
                                            title="{{ $item->title }}"
                                        >
                                            <i class="social-bar__icon">
                                                <svg class="social-bar__icon-svg" fill="{{ $item->color }}">
                                                    <use xlink:href="{{ $sprites }}{{ $item->icon }}" />
                                                </svg>
                                            </i>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="uk-width-auto">
                    <div class="contacts-bar">
                        <ul class="contacts-bar__list uk-flex uk-padding-remove-left">
                            @foreach ($contacts as $item)
                                <li class="contacts-bar__list-item" title="{{ $item->title }}">
                                    @if ($item->flag)
                                        <i class="contacts-bar__icon">
                                            <svg class="contacts-bar__icon-svg" fill="{{ $item->color }}">
                                                <use xlink:href="{{ $sprites }}{{ $item->icon }}" />
                                            </svg>
                                        </i>
                                        <span class="contacts-bar__text">
                                            {{ $item->text }}
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="header__main uk-padding-small">
        <div class="uk-container">
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <div class="uk-width-auto trigger uk-hidden@m">
                    <button 
                        class="trigger__btn" 
                        type="button" 
                        aria-label="Toggle navigation" 
                    >
                        <svg class="trigger__icon">
                            <use xlink:href="{{ $sprites }}#icon-filter" />
                        </svg>
                    </button>
                </div>
                <div class="uk-width-auto logo uk-visible@m">
                    <a class="logo__link" href="{{ route('home') }}">
                        <svg class="logo__icon">
                            <use xlink:href="{{ $sprites }}#icon-logo-desktop-left" />
                        </svg>
                    </a>
                </div>
                <div class="uk-width-auto logo-mobile uk-hidden@m">
                    <a class="logo-mobile__link" href="{{ route('home') }}">
                        <svg class="logo-mobile__icon">
                            <use xlink:href="{{ $sprites }}#icon-logo-mobile" />
                        </svg>
                    </a>
                </div>
                <nav class="uk-width-auto navigation uk-visible@m" aria-label="Navigation menu">
                    <ul class="navigation__list uk-padding-remove-left">
                        @foreach ($navigation as $item)
                            <li class="navigation__list-item">
                                <a 
                                class="navigation__link {{ Route::is($item->slug) ? 'navigation__link--active' : null }}" 
                                href="{{ route($item->slug) }}" 
                                >
                                    {{ $item->text }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</header>