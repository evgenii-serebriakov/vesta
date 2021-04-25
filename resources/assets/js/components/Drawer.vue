<template lang="pug">
.drawer
    header.menu
        .uk-flex.uk-flex-middle.uk-flex-between.uk-flex-wrap
            .uk-width-auto.menu__caption
                h6.menu__text.m-0.uk-text-uppercase.uk-text-bold.uk-margin-remove-bottom Меню
            .uk-width-auto.close
                button.close__btn(
                    type="button" 
                    aria-label="Close"
                    @click="closeDrawer"
                )
                    svg.close__icon
                            use(:xlink:href="sprites + '#icon-close'")

    nav.nav-main(aria-label="Mobile navigation")
        ul.nav-main__list.uk-flex.uk-flex-column.uk-padding-remove-left
            li.nav-main__list-item(v-for="item in navigation" :key="item.text")
                a.nav-main__link(href="#/") 
                    i.icon
                        svg.icon__svg
                            use(:link:href="sprites + item.icon")
                    span.nav-main__link-text {{ item.text }}

</template>

<script>
import { inject } from 'vue';

export default {
    name: 'Drawer',
    props: {
        closeDrawer: {
            type: Function,
            default: () => {}
        }
    },
    setup() {
        const sprites = inject('sprites');
        const navigation = inject('navigation');

        return {
            sprites,
            navigation
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.drawer {
    min-height: 100vh;
    border-right: 2px solid $purpleSaturate;
    background-color: #fff;

    .menu {
        background-color: #f5f5f5;
        border-bottom: 1px solid $light-black;

        &__caption {
            padding-left: rem(10);
        }

        &__text {
            color: rgba(0, 0, 0, 0.63);
            font-size: 18px;
        }
    }

    .close {
        &__btn {
            border: none;
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

    .nav-main {
        background-color: #f5f5f5;
        border-bottom: 1px solid $light-black;

        &__list {
            list-style: none;
        }

        &__link {
            font-size: 16px;
            text-transform: uppercase;
            color: $greyColor;
            padding-left: 5px;
            text-decoration: none;

            &:hover {
                color: $purpleSaturate;
            }

            &-text {
                padding-left: 5px;
                display: inline-block;
            }
        }
    }

    .icon {
        display: inline-block;
        vertical-align: text-bottom;
        fill: $purpleSaturate;

        &__svg {
            width: 16px;
            height: 16px;
        }
    }
}
</style>