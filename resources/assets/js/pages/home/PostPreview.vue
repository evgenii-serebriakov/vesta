<template lang="pug">
section.posts.grey.lighten-4
    v-container.posts__inner
        .isoteric
            i.isoteric__icon
                svg.isoteric__icon-svg
                    use(:xlink:href="sprites + '#icon-isoteric'")

        h2.posts__title.text-uppercase.font-weight-bold.decorating-line Последние посты

        v-row
            v-col(cols="12" sm="6" md="4" v-for="item in images" :key="item.text")
                .teasers.white
                    .teasers__item-wrap
                        a.teasers__link(href="#/") 
                            img.teasers__img(:src="item.path", :alt="item.text")
                    .teasers__content
                        a.teasers__link(href="#/") 
                            h5.teasers__title.text-uppercase.font-weight-medium Lorem ipsum
                        span.teasers__meta-info Март 06 2021
                        .teasers__footer-wrap
                            a.teasers__link.teasers__link--hover(href="#/") 
                                span.teasers__text.text-uppercase Далее
                                i.teasers__icon
                                    svg.teasers__icon-svg
                                        use(:xlink:href="sprites + '#icon-arrow-right'")

        .separator-line
</template>

<script>
export default {
    setup() {
        const sprites = '/assets/images/sprites.svg';

        const images = [
            {
                path: '/assets/images/jpg/sity_bg.jpg',
                text: 'bg-1'
            },
            {
                path: '/assets/images/jpg/bg_0.jpg',
                text: 'bg-2'
            },
            {
                path: '/assets/images/jpg/bg_1.jpg',
                text: 'bg-3'
            },
        ];

        return {
            images,
            sprites
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.posts {
    &__inner {
        padding-top: 50px;
    }

    &__title {
        position: relative;
        color: $greyColor;
        font-size: 25px;
        margin-bottom: rem(40);
    }

    .isoteric {
        &__icon {
            fill: $purpleSaturate;
            display: block;
            text-align: center;
            padding-bottom: rem(30);

            &-svg {
                width: 300px;
                height: 35px;
            }
        }
    }

    .teasers {
        border: none;

        &__content {
            padding: 0.7rem 1rem;
        }

        &:hover {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        &__title {
            font-size: 22px;
            color: $defaultColor;
            margin: 0;
        }

        &__meta-info {
            color: $greyColor;
            font-size: 13px;
        }

        &__link {
            display: block;
            text-decoration: none;
            color: $greyColor;
            fill: $greyColor;

            &--hover {
                &:hover {
                    color: $purpleSaturate;
                    fill: $purpleSaturate;
                }
            }
        }

        &__footer-wrap {
            padding-top: 15px;
        }

        &__text {
            font-size: 13px;
        }

        &__icon-svg {
            width: 10px;
            height: 10px;
        }
    }
}

</style>