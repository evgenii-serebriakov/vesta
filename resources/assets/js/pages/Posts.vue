<template lang="pug">
section.posts.uk-section
    .uk-container
        .grid.uk-child-width-1-1.uk-grid-divider.uk-grid-match.uk-grid-small(class="uk-child-width-1-1@m")
            .post__col(v-for="item in images" :key="item.text")
                article.teaser.uk-article.article
                    router-link.teaser__link.uk-flex.uk-flex-column.uk-flex-wrap.uk-card.uk-card-default.uk-card-hover(
                        :to="{ name: 'single-post', params: { id: '123' }}"
                    )
                        .teaser__item-wrap.uk-card-media-top.uk-width-1-1(class="uk-width-1-3@m")
                            .teaser__link
                                img.teaser__img(:src="item.path", :alt="item.text")
                    
                        .teaser__content.uk-flex.uk-flex-column.uk-width-1-1(class="uk-width-2-3@m")
                            .teaser__header.uk-card-headers
                                h5.teaser__title.uk-card-title.uk-text-normal.uk-text-uppercase.decorating-line Lorem ipsum

                                p.teaser__meta-info.uk-text-meta
                                    time(
                                        datetime="2004-07-24T18:18"
                                        aria-label="Date of publication"
                                    ) Март 06 2021

                            .teaser__body.uk-card-body.uk-flex-1
                                p.teaser__desc.uk-text-break Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut dolore...

                            .teaser__footer.uk-card-footer
                                span.teaser__text.uk-text-uppercase.uk-text-middle Далее
                                i.teaser__icon
                                    svg.teaser__icon-svg
                                        use(:xlink:href="sprites + '#icon-arrow-right'")


</template>

<script>
import { onMounted, inject } from 'vue';
import { grid } from 'uikit';

export default {
    setup() {
        const sprites = inject('sprites');
        const images = inject('images');

        onMounted(() => grid('.grid'));
        
        return {
            images,
            sprites
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.posts {
    background-image: radial-gradient(circle at 100% 50%, #f8f8f8 50%, rgba(150, 23, 23, 0) 0%);
}

.teaser {
    &__link {
        text-decoration: none;

        @include media-breakpoint(960) {
            flex-direction: row;
        }
    }

    &__header {
        padding: 0.7rem 1rem;
    }

    &__title {
        position: relative;
        font-size: 22px;
        color: $default-color;
        margin: 0;

        &::before {
            top: 59px;
            background: #e5e5e5;
        }
    }

    &__meta-info {
        color: $greyColor;
    }

    &__body {
        padding: 0.7rem 1rem;
    }

    &__desc {
        background: transparent;
        color: $greyColor;
        font-size: rem(26);
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
        width: 11px;
        height: 11px;
    }
}
</style>