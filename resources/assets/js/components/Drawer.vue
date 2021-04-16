<template lang="pug">
.drawer
    header.menu.border-b-sm
        .d-flex.justify-space-between.flex-wrap.align-center
            v-col.menu__caption(cols="auto")
                h6.menu__text.m-0.text-uppercase.text-black-50.font-weight-bold Меню
            v-col.close(cols="auto")
                button.close__btn.p-0(
                    type="button" 
                    aria-label="Close"
                    @click="drawer = false"
                )
                    svg.close__icon
                            use(:xlink:href="sprites + '#icon-close'")

    nav.nav-main.border-b-sm(aria-label="Mobile navigation")
        ul.flex-column.nav-main__list.pl-0
            li.nav-main__list-item(v-for="item in navigation" :key="item.text")
                a.nav-main__link(href="#/") 
                    i.icon
                        svg.icon__svg
                            use(:link:href="sprites + item.icon")
                    span.nav-main__link-text {{ item.text }}

</template>

<script>
export default {
    name: 'Drawer',
    props: {
        drawer: Boolean
    },
    setup() {
        const sprites = '/assets/images/sprites.svg';

        const navigation = [
            {text: 'Главная', icon: '#icon-home'},
            {text: 'Видео', icon: '#icon-camera'},
            {text: 'Блог', icon: '#icon-news'},
            {text: 'Отзывы', icon: '#icon-comment'},
        //- {text: 'Контакты', icon: '#phone'}
        ];

        return {
            sprites,
            navigation
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

.drawer {
    min-height: 100vh;
    border-right: 2px solid $purpleSaturate;
    background-color: #fff;

    .menu {
        background-color: #f5f5f5;
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