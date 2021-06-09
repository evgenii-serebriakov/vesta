<footer class="footer">
    <section class="seperator">
        <div class="uk-container">
            <div class="uk-flex uk-flex-wrap uk-flex-between@m">
                <div class="uk-width-1-1 uk-width-1-2@s uk-width-auto@m">
                    <nav class="bottom-nav" aria-label="Bottom navigation">
                        <ul class="bottom-nav__list uk-flex-column">
                            @foreach ($navigation as $item)
                                <li class="bottom-nav__list-item">
                                    <a 
                                        active-class="bottom-nav__link--active"
                                        class="bottom-nav__link uk-text-uppercase" 
                                        href="{{ route($item->slug) }}" 
                                    >
                                        <span class="bottom-nav__link-text">
                                            {{ $item->text }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s uk-width-auto@m uk-flex-last@m">
                    <div class="contacts">
                        <h5 class="contacts__title uk-text-uppercase uk-margin-small-bottom">Контакты</h5>
                        <ul class="contacts__list">
                            @foreach ($contacts as $item)
                                <li class="contacts__list-item" title="{{ $item->title }}">
                                    @if ($item->flag)
                                        <i class="contacts__icon">
                                            <svg class="contacts__icon-svg" fill="{{ $item->color }}">
                                                <use xlink:href="{{ $sprites }}{{ $item->icon }}" />
                                            </svg>
                                        </i>
                                        <span class="contacts__text">
                                            {{ $item->text }}
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-1@s uk-width-auto@m">
                    <div class="social">
                        <ul class="social__list uk-flex uk-flex-row uk-flex-wrap uk-flex-center">
                            @foreach ($social as $item)
                                <li class="social__list-item">
                                    @if ($item->flag)
                                        <a 
                                            class="social__link" 
                                            href="{{ $item->path }}"
                                            title="{{ $item->title }}"
                                        >
                                            <i class="social__icon uk-hidden@m">
                                                <svg class="social__icon-svg" fill="{{ $item->color }}">
                                                    <use xlink:href="{{ $sprites }}{{ $item->icon }}" />
                                                </svg>
                                            </i>
                                            <span class="social__link-text uk-visible@m">
                                                {{ $item->text }}
                                            </span>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="copyright uk-padding-small">
        <div class="uk-container">
            <div class="uk-flex uk-flex-middle uk-flex-wrap uk-flex-between@m">
                <div class="uk-width-1-1 uk-width-1-2@m">
                    <div class="copyright__logo uk-margin-auto uk-margin-remove-left@m">
                        <svg class="copyright__icon-logo">
                            <use xlink:href="{{ $sprites }}#icon-logo-desktop-left" />
                        </svg>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@m">
                    <p class="copyright__text uk-text-center uk-margin-remove uk-text-right@m">
                        <i
                            class="copyright__icon">
                            <svg class="copyright__icon-svg">
                                <use :xlink:href="sprites + '#icon-copyright'" />
                            </svg>
                        </i>
                        <span>
                            Центр Веста 2021{{ ((int) Date('Y') >= 2022) ? '-'.Date('Y'): '' }}. Все права защищенны.
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer>