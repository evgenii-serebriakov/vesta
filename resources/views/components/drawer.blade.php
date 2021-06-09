<div class="drawer">
    <header class="menu">
        <div class="uk-flex uk-flex-middle uk-flex-between uk-flex-wrap">
            <div class="uk-width-auto menu__caption">
                <h6 class="menu__text m-0 uk-text-uppercase uk-text-bold uk-margin-remove-bottom">
                    Меню
                </h6>
            </div>
            <div class="uk-width-auto close">
                <button class="close__btn" type="button" aria-label="Close">
                    <svg class="close__icon">
                        <use xlink:href="{{ $sprites }}#icon-close" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <nav class="nav-main" aria-label="Mobile navigation">
        <ul class="nav-main__list uk-flex uk-flex-column uk-padding-remove-left">
            @foreach ($navigation as $item)
                <li class="nav-main__list-item">
                    <a 
                        active-class="nav-main__link--active"
                        class="nav-main__link uk-display-block {{ Route::is($item->slug) ? 'nav-main__link--active' : null }}" 
                        href="{{ route($item->slug) }}"
                    >
                        <i class="icon">
                            <svg class="icon__svg">
                                <use xlink:href="{{ $sprites }}{{ $item->icon }}" />
                            </svg>
                        </i>
                        <span class="nav-main__link-text">
                            {{ $item->text }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>