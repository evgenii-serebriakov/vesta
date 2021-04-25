<template lang="pug">
section.posts.uk-background-muted
    .uk-container.posts__inner
        .isoteric
            i.isoteric__icon
                svg.isoteric__icon-svg
                    use(:xlink:href="sprites + '#icon-isoteric'")

        h2.posts__title.uk-text-uppercase.uk-text-bold.decorating-line Последние видео
        //- Slider start
        div(class="uk-slider-container-offset slider")

            div(class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1")

                ul(class="uk-slider-items uk-child-width-* uk-child-width-1-2@s uk-child-width-1-3@m uk-grid")
                    li(v-for="item in [1, 2, 3]" :key="item")
                        div(class="uk-card uk-card-default")
                            div(class="uk-card-media-top")
                                img(src="assets/images/bg_0.jpg" alt="")
                           
                            div(class="uk-card-body")
                                h3(class="uk-card-title") Headline lorem
                   

                a(class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous")

                a(class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next")


            ul(class="uk-slider-nav uk-dotnav uk-flex-center uk-margin")
        //- Slider end

        .separator-line
</template>

<script>
import { onMounted, inject } from 'vue';
import { slider } from 'uikit';

export default {
    name:'HomeVideoPreview',
    setup() {
        const sprites = inject('sprites');

        onMounted(() => {
            slider('.slider', { center: false, finite: false });
        });
        
        return {
            sprites
        };
    },
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
            color: $default-color;
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