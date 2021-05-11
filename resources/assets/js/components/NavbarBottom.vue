<template lang="pug">

footer.footer
    section.seperator
        .uk-container
            .uk-flex.uk-flex-wrap(class="uk-flex-between@m")
                .uk-width-1-1(class="uk-width-1-2@s uk-width-auto@m")
                    nav.bottom-nav(aria-label="Bottom navigation")
                        ul.bottom-nav__list.uk-flex-column
                            li.bottom-nav__list-item(
                                v-for="item in navigation"
                                :key="item.text"
                            )
                                router-link.bottom-nav__link.uk-text-uppercase(
                                    :to="item.path"
                                    active-class="bottom-nav__link--active"
                                ) 
                                    span.bottom-nav__link-text {{ item.text }}
                
                .uk-width-1-1(class="uk-width-1-2@s uk-width-auto@m uk-flex-last@m")
                    .contacts
                        h5.contacts__title.uk-text-uppercase.uk-margin-small-bottom Контакты
                        ul.contacts__list
                            li.contacts__list-item(
                                v-for="item in contacts"
                                :title="item.title"
                                :key="item.text"
                            )
                                i.contacts__icon
                                    svg.contacts__icon-svg(:fill="item.color")
                                        use(:xlink:href="sprites + item.icon")
                                span.contacts__text(:class="item.id") {{ item.text }}
                
                .uk-width-1-1(class="uk-width-1-1@s uk-width-auto@m")
                    .social
                        ul.social__list.uk-flex.uk-flex-row.uk-flex-wrap.uk-flex-center
                            li.social__list-item(
                                v-for="item in social"
                                :key="item.text"
                            )
                                a.social__link(href="#/" :title="item.title")
                                    i.social__icon(class="uk-hidden@m")
                                        svg.social__icon-svg(:fill="item.color")
                                            use(:xlink:href="sprites + item.icon")
                                    span.social__link-text(class="uk-visible@m") {{ item.text }}

    section.copyright.uk-padding-small
        .uk-container
            .uk-flex.uk-flex-middle.uk-flex-wrap(class="uk-flex-between@m")
                .uk-width-1-1(class="uk-width-1-2@m")
                    .copyright__logo.uk-margin-auto(class="uk-margin-remove-left@m")
                        svg.copyright__icon-logo
                            use(:xlink:href="sprites + '#icon-logo-desktop-left'")

                .uk-width-1-1(class="uk-width-1-2@m")
                    p.copyright__text.uk-text-center.uk-margin-remove(class="uk-text-right@m")
                        i.copyright__icon
                            svg.copyright__icon-svg
                                use(:xlink:href="sprites + '#icon-copyright'")
                        span Центр Веста 2021. Все права защищенны.

</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

export default {
    name: 'NavbarBottom',
    setup() {
        const store = useStore();
        const navigation = computed(() => store.getters.navigation);
        const sprites = computed(() => store.getters.sprites);
        const social = computed(() => store.getters.social);
        const contacts = computed(() => store.getters.contacts);

        return {
            navigation: navigation.value,
            social: social.value,
            contacts: contacts.value,
            sprites: sprites.value,
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.footer {
    .seperator {
        border-top: 1px solid $light-black;
        border-bottom: 1px solid $light-black;
        padding: rem(15) 0;

        @include media-laptop {
            padding: rem(40) 0;
        }
    }

    .bottom-nav {
        &__list {
            padding-left: 0;
            list-style: none;
        }

        &__link {
            color: rgb(82, 78, 78);
            display: block;
            padding: 0.5rem 1rem;
            text-decoration: none;

            &:hover {
                color: $default-color;
            }

            &--active {
                color: $default-color;
            }
        }
    }

    .social {
        &__list {
            padding: 0;
            list-style: none;

            @include media-breakpoint(960) {
                flex-direction: column;
            }
        }

        &__link {
            display: block;
            color: rgb(82, 78, 78);
            text-transform: uppercase;
            padding: 8px 16px;
            text-decoration: none;

            &:hover {
                color: $default-color;
            }
        }

        &__icon {
            &-svg {
                width: 25px;
                height: 25px;
            }
        }
    }

    .contacts {
        color: rgb(82, 78, 78);
        padding-left: 16px;

        &__title {
            font-size: 18px;
        }

        &__list {
            list-style: none;
            padding-left: 0;

            &-item {
                padding: rem(4) 0;

                @include media-laptop {
                    padding: rem(8) 0;
                }
            }
        }

        &__text {
            font-size: 20px;
        }

        &__icon {
            padding-right: rem(10);

            &-svg {
                width: 18px;
                height: 18px;
            }
        }
    }

    .copyright {
        &__logo {
            max-width: 90px;
        }

        &__icon {
            &-logo {
                width: 90px;
                height: 25px;
                fill: $themeColor;
            }

            &-svg {
                fill: $greyColor;
                width: 15px;
                height: 15px;
                padding-right: 5px;
                vertical-align: text-bottom;
            }
        }

        &__text {
            font-size: 13px;
            text-transform: uppercase;
            color: $greyColor;
            padding-top: rem(10);

            @include media-breakpoint(960) {
                padding: 0;
            }
        }
    }
}
</style>>
