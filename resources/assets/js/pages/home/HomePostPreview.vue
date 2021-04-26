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
                            a.teasers.uk-display-block.uk-card.uk-card-default.uk-card-hover(href="#/")
                                .teasers__item-wrap.uk-card-media-top
                                    .teasers__link
                                        img.teasers__img(:src="item.path", :alt="item.text")
                            
                                .teasers__content.uk-card-body
                                    h5.teasers__title.uk-card-title.uk-text-normal.uk-text-uppercase Lorem ipsum

                                    p.teasers__meta-info.uk-text-meta
                                        time(datetime="2004-07-24T18:18") Март 06 2021
                                .teasers__footer.uk-card-footer
                                    span.teasers__text.uk-text-uppercase.uk-text-middle Далее
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

        &__title {
            font-size: 22px;
            color: $default-color;
            margin: 0;
        }

        &__meta-info {
            color: $greyColor;
        }

        &__footer {
            padding: 0.7rem 1rem;
            color: $greyColor;
            fill: $greyColor;

            &:hover {
                color: $purpleSaturate;
                fill: $purpleSaturate;
            }
        }

        &__text {
            font-size: 14px;
            padding-right: 2px;
        }

        &__icon-svg {
            width: 12px;
            height: 12px;
        }
    }
}

</style>