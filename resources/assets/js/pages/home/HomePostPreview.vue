<template lang="pug">
section.posts.uk-background-muted
     .uk-container.posts__inner
        .isoteric
            i.isoteric__icon
                svg.isoteric__icon-svg
                    use(:xlink:href="sprites + '#icon-isoteric'")

        h2.posts__title.uk-text-uppercase.uk-text-bold.decorating-line Последние посты

        div(class="uk-slider-container-offset slider")
            div(class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1")

                ul(class="uk-slider-items uk-child-width-* uk-child-width-1-2@s uk-child-width-1-3@m uk-grid")
                    li(v-for="item in images" :key="item.text")
                        article.uk-article
                            .teasers(class="uk-card uk-card-default")
                                .teasers__item-wrap(class="uk-card-media-top")
                                    a.teasers__link(href="#/") 
                                        img.teasers__img(:src="item.path", :alt="item.text")
                            
                                .teasers__content(class="uk-card-body")
                                    a.teasers__link(href="#/") 
                                        h5.teasers__title.uk-card-title.uk-text-normal.uk-text-uppercase Lorem ipsum

                                    span.teasers__meta-info.uk-text-meta Март 06 2021
                                    .teasers__footer-wrap
                                        a.teasers__link.teasers__link--hover(href="#/") 
                                            span.teasers__text.uk-text-uppercase Далее
                                            i.teasers__icon
                                                svg.teasers__icon-svg
                                                    use(:xlink:href="sprites + '#icon-arrow-right'")
                    

                a(class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous")

                a(class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next")


            ul(class="uk-slider-nav uk-dotnav uk-flex-center uk-margin")

        .separator-line
</template>

<script>
import { inject, onMounted } from 'vue';
import { slider } from 'uikit';

export default {
    name: 'HomePostPreview',
    setup() {
        const sprites = inject('sprites');
        const images = inject('images');

        onMounted(() => {
            slider('.slider');
        });
        
        
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
            // font-size: 13px;
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
            font-size: 14px;
        }

        &__icon-svg {
            width: 10px;
            height: 10px;
        }
    }
}

</style>