<template lang="pug">

footer.footer

    section.seperator.border-t-sm.border-b-sm.py-3.py-md-10
        v-container
            v-row(justify-md="space-between")
                v-col(cols="12" sm="6" md="auto" order-md="0")
                    nav.bottom-nav(aria-label="Bottom navigation")
                        ul.nav.flex-column.bottom-nav__list
                            li.nav-item.bottom-nav__list-item(
                                v-for="item in navigation"
                                :key="item.text"
                            )
                                a.nav-link.bottom-nav__link.text-uppercase(href="#/") 
                                    span.bottom-nav__link-text {{ item.text }}
                
                v-col(cols="12" sm="6" md="auto" order-md="2")
                    .contacts
                        h5.contacts__title.font-weight-medium Контакты
                        ul.contacts__list
                            li.contacts__list-item.py-1.py-md-2(
                                v-for="item in contacts"
                                :title="item.title"
                                :key="item.text"
                            )
                                i.contacts__icon
                                    svg.contacts__icon-svg(:fill="item.color")
                                        use(:xlink:href="sprites + item.icon")
                                span.pl-2(:class="item.id") {{ item.text }}
                
                v-col(cols="12" sm="12" md="auto" order="2" order-md="1")
                    .social
                        ul.social__list.d-flex.flex-row.flex-md-column.flex-wrap.justify-center.m-0
                            li.social__list-item(
                                v-for="item in social"
                                :key="item.text"
                            )
                                a.social__link(href="#/" :title="item.title")
                                    i.social__icon.d-md-none
                                        svg.social__icon-svg(:fill="item.color")
                                            use(:xlink:href="sprites + item.icon")
                                    span.social__link-text.d-none.d-md-block {{ item.text }}

    section.copyright.py-2.py-md-3
        v-container
            v-row(justify="space-between" align="center")
                v-col(cols="12" md="6")
                    .copyright__logo.mx-auto.ml-md-0
                        svg.copyright__icon-logo
                            use(:xlink:href="sprites + '#icon-logo-desktop-left'")

                v-col(cols="12" md="6")
                    p.copyright__text.text-center.text-md-end.mb-0
                        i.copyright__icon
                            svg.copyright__icon-svg
                                use(:xlink:href="sprites + '#icon-copyright'")
                        span Центр Веста 2021. Все права защищенны.

</template>

<script>
export default {
    name: 'Footer',
    setup() {
        const sprites = '/assets/images/sprites.svg';

        const navigation = [
            {text: 'Главная', icon: '#icon-home'},
            {text: 'Видео', icon: '#icon-camera'},
            {text: 'Блог', icon: '#icon-news'},
            {text: 'Отзывы', icon: '#icon-comment'},
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
            {title: 'Адрес', text: '216 street address, barisal, bd', icon: '#icon-map', color: '#be0000'}
        ]; 

        return {
            navigation,
            social,
            contacts,
            sprites
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

.footer {
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
                color: $defaultColor;
            }
        }
    }

    .social {
        &__list {
            padding: 0;
            list-style: none;
        }

        &__link {
            display: block;
            color: rgb(82, 78, 78);
            text-transform: uppercase;
            padding: 8px 16px;
            text-decoration: none;

            &:hover {
                color: $defaultColor;
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
        text-transform: uppercase;
        padding-left: 16px;

        &__title {
            font-size: 18px;
        }

        &__list {
            list-style: none;
            padding-left: 0;
        }

        &__text {
            text-transform: lowercase;
        }

        &__icon {
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
        }
    }
}
</style>>
