<template lang="pug">
    
header.header
    section.header__secondary.border-b-sm.d-none.d-md-block
        v-container
            v-row(justify-lg="space-between" justify-md="center")
                v-col(cols="auto")
                    .social-bar
                        ul.social-bar__list.d-flex.flex-row.m-0.pl-0
                            li.social-bar__list-item(v-for="item in social" :key="item.title")
                                a.social-bar__link(href="#/" :title="item.title")
                                    i.social-bar__icon
                                        svg.social-bar__icon-svg(:fill="item.color")
                                            use(:xlink:href="sprites + item.icon")
                                        
                v-col(cols="auto")
                    .contacts-bar
                        ul.contacts-bar__list.d-flex.mb-0
                            li.contacts-bar__list-item.pr-3(v-for="item in contacts" :key="item.title" :title="item.title")
                                i.contacts-bar__icon
                                    svg.contacts-bar__icon-svg(:fill="item.color")
                                        use(:xlink:href="sprites + item.icon")
                                span.contacts-bar__text.pl-1 {{ item.text }}

    section.header__main
        v-container
            v-row(justify="space-between" align="center")
                v-col(cols="auto").trigger.d-lg-none
                    button.trigger__btn.border-0.p-0(
                        type="button"
                        aria-label="Toggle navigation"
                        @click="drawer = true"
                    )
                        svg.trigger__icon
                            use(:xlink:href="sprites + '#icon-filter'")

                v-col.logo.d-none.d-lg-block(cols="auto")
                    a.logo__link(href="#/")
                        svg.logo__icon
                            use(:xlink:href="sprites + '#icon-logo-desktop-left'")
                    
                v-col(cols="auto").logo-mobile.d-lg-none
                    a.logo-mobile__link(href="#/") 
                        svg.logo-mobile__icon
                            use(:xlink:href="sprites + '#icon-logo-mobile'")

                v-col.navigation.d-none.d-lg-block(
                    cols="auto" tag="nav"
                    aria-label="Navigation menu"
                )
                    ul.nav.navigation__list.pl-0
                        li.nav-item.navigation__list-item(v-for="item in navigation" :key="item.text")
                            a.nav-link.navigation__link(href="#/") {{ item.text }}


</template>

<script>

export default {
    name: 'Navbar',
    props: {
        drawer: Boolean
    },
    setup() {
        const sprites = '/assets/images/sprites.svg';

        const navigation = [
            {text: 'Главная', icon: '#home'},
            {text: 'Видео', icon: '#camera'},
            {text: 'Блог', icon: '#news'},
            {text: 'Отзывы', icon: '#comment'},
        //- {text: 'Контакты', icon: '#phone'}
        ];

        const social = [
            {title: 'Youtube', text: 'Youtube', icon: '#icon-youtube', color: '#FF0000'},
            {title: 'Instagram', text: 'Instagram', icon: '#icon-instagram', color: '#8134AF'},
            {title: 'WhatsApp', text: 'WhatsApp', icon: '#icon-whatsapp', color: '#4FCE5D'},
            {title: 'Twitter', text: 'Twitter', icon: '#icon-twitter', color: '#55ACEE'},
            {title: 'Facebook', text: 'Facebook', icon: '#icon-facebook', color: '#3C5898'},
            {title: 'Вконтакте', text: 'VK', icon: '#icon-vk', color: '#5181B8'},
            {title: 'Viber', text: 'Viber', icon: '#icon-viber', color: '#665CAC'}
        ]; 

        const contacts = [
            {title: 'Телефон', text: '8 (999) 899 43 33', icon: '#icon-phone', color: '#17c42e'},
            {title: 'Почта', text: 'exemple@mail.com', icon: '#icon-mail', color: '#22b9f5', id: 'contacts__text'},
            {title: 'Адрес', text: '216 street address ', icon: '#icon-map', color: '#be0000'}
        ]; 

        return {
            navigation,
            social,
            contacts,
            sprites
        };
    },
    data() {
        return {
            isDrawer: this.drawer
        };
    },
    computed: {
    },
    methods: {
        onVisible: function () {
        }
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

.header {
    z-index: 1;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);

    &__secondary {
        background-color: #f5f5f5;
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
        &__icon {
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
        }
    }
}
 </style>