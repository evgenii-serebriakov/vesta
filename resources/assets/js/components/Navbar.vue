<template lang="pug">
header.header
    section.header__secondary.uk-padding-small(class="uk-visible@m")
        .uk-container
            .uk-flex.uk-flex-center.uk-flex-wrap(class="uk-flex-between@m")
                .uk-width-auto
                    .social-bar
                        ul.social-bar__list.uk-flex.uk-flex-row.uk-padding-remove-left
                            li.social-bar__list-item(v-for="item in social" :key="item.title")
                                a.social-bar__link(href="#/" :title="item.title")
                                    i.social-bar__icon
                                        svg.social-bar__icon-svg(:fill="item.color")
                                            use(:xlink:href="sprites + item.icon")
                                        
                .uk-width-auto
                    .contacts-bar
                        ul.contacts-bar__list.uk-flex.uk-padding-remove-left
                            li.contacts-bar__list-item(v-for="item in contacts" :key="item.title" :title="item.title")
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
                                :to="item.path" active-class="navigation__link--active"
                            ) {{ item.text }}
</template>

<script>
import { onMounted, computed } from 'vue';
import { 
    useStore,
} from 'vuex';

import { sticky } from 'uikit';

export default {
    name: 'Navbar',
    props: {
        openDrawer: {
            type: Function,
            default: () => {}
        }
    },
    setup() {
        const store = useStore();
        const navigation = computed(() => store.getters.navigation);
        const sprites = computed(() => store.getters.sprites);
        const social = computed(() => store.getters.social);
        const contacts = computed(() => store.getters.contacts);

        onMounted(() => {
            sticky('.header__main');
        });

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

.header {
    &__secondary {
        background-color: #f5f5f5;
        border-bottom: 1px solid $light-black;
    }

    &__main {
        position: relative;
        background-color: #fff;
        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 15%);
        z-index: 1;
    }

    .social-bar,
    .contacts-bar {
        &__list {
            list-style: none;
        }

        &__link {
            padding: 8px 8px;
        }

        &__icon {
            &-svg {
                width: 25px;
                height: 25px;
            }
        }
    }

    .contacts-bar {
        &__list {
            &-item {
                padding-right: rem(15);
            }
        }

        &__icon {
            padding-right: rem(10);

            &-svg {
                width: 18px;
                height: 18px;
            }
        }
    }

    .logo {
        &__link {
            display: block;
        }

        &__icon {
            width: 150px;
            height: 40px;
            fill: $themeColor;
        }
    }

    .logo-mobile {
        &__link {
            display: block;
        }

        &__icon {
            width: 35px;
            height: 45px;
            fill: $themeColor;
        }
    }

    .trigger {
        &__btn {
            border: none;
            outline: none;
            background-color: transparent;
        }

        &__icon {
            width: 40px;
            height: 40px;
            fill: $purpleSaturate;

            &:hover {
                fill: $purpleColor100;
            }
        }
    }

    .navigation {
        &__list {
            display: flex;
            list-style: none;
        }

        &__link {
            text-decoration: none;
            font-size: 20px;
            text-transform: uppercase;
            color: $greyColor;
            padding: 0.5rem 1rem;

            &:focus {
                color: $purpleSaturate;
            }

            &:hover {
                color: $purpleSaturate;
            }

            &--active {
                color: $purpleSaturate;
            }
        }
    }
}
 </style>