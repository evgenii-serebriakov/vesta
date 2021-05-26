header.header
    section.header__secondary.uk-padding-small(class="uk-visible@m")
        .uk-container
            .uk-flex.uk-flex-center.uk-flex-wrap(class="uk-flex-between@m")
                .uk-width-auto
                    .social-bar
                        ul.social-bar__list.uk-flex.uk-flex-row.uk-padding-remove-left
                            li.social-bar__list-item(v-for="item in social" :key="item.title")
                                template(v-if="item.flag")
                                    a.social-bar__link(:href="item.path" :title="item.title")
                                        i.social-bar__icon
                                            svg.social-bar__icon-svg(:fill="item.color")
                                                use(:xlink:href="sprites + item.icon")
                                        
                .uk-width-auto
                    .contacts-bar
                        ul.contacts-bar__list.uk-flex.uk-padding-remove-left
                            li.contacts-bar__list-item(v-for="item in contacts" :key="item.title" :title="item.title")
                                template(v-if="item.flag")
                                    i.contacts-bar__icon
                                        svg.contacts-bar__icon-svg(:fill="item.color")
                                            use(:xlink:href="sprites + item.icon")
                                    span.contacts-bar__text {{ item.text }}

    section.header__main.uk-padding-small
        .uk-container
            .uk-flex.uk-flex-between.uk-flex-middle
                .uk-width-auto.trigger(class="uk-hidden@m")
                    button.trigger__btn(
                        type="button"
                        aria-label="Toggle navigation"
                        @click="openDrawer"
                    )
                        svg.trigger__icon
                            use(:xlink:href="sprites + '#icon-filter'")

                .uk-width-auto.logo(class="uk-visible@m")
                    router-link.logo__link(to="/")
                        svg.logo__icon
                            use(:xlink:href="sprites + '#icon-logo-desktop-left'")
                    
                .uk-width-auto.logo-mobile(class="uk-hidden@m")
                    router-link.logo-mobile__link(to="/")
                        svg.logo-mobile__icon
                            use(:xlink:href="sprites + '#icon-logo-mobile'")

                nav.uk-width-auto.navigation(
                    class="uk-visible@m"
                    aria-label="Navigation menu"
                )
                    ul.navigation__list.uk-padding-remove-left
                        li.navigation__list-item(v-for="item in navigation" :key="item.text")
                            router-link.navigation__link(
                                :to="item.path" 
                                active-class="navigation__link--active"
                            ) {{ item.text }}
