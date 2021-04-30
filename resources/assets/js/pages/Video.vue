<template lang="pug">
section.video.uk-section
    .uk-container
        .grid.uk-child-width-1-1.uk-grid-divider.uk-grid-match.uk-grid-small(class="uk-child-width-1-3@m uk-child-width-1-2@s")
            .video__col(v-for="item in numbers" :key="item")
                article.teaser.uk-article.uk-card
                    router-link.teaser__link.uk-display-block(
                        :to="{ name: 'single-video', params: { id: '999' }}"
                    )
                        .teaser__image.uk-card-media-top
                            img(src="assets/images/bg_0.jpg" alt="")
                    
                        .teaser__body
                            h5.teaser__title.uk-card-title.uk-text-uppercase Headline lorem
</template>

<script>
import { onMounted } from 'vue';
import { grid } from 'uikit';

export default {
    setup() {
        const numbers = [...Array(9).fill().keys()];

        onMounted(() => {
            grid('.grid');
        });

        return {
            numbers
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.video {
    background-image: radial-gradient(circle at 0% 50%, #f8f8f8 50%, rgba(150, 23, 23, 0) 0%);
}

.teaser {
    &__link {
        text-decoration: none;
    }

    &__title {
        padding-top: rem(10);
        font-size: 22px;
        color: $default-color;
        margin: 0;

        &::after {
            content: " ";
            display: block;
            width: 0%;
            margin: 0 auto;
            height: 1px;
            background: $purpleSaturate;
            transition: width 0.4s, ease 0.4s;
        }

        &:hover {
            &::after {
                width: 100%;
            }
        }
    }
}

.teaser:hover .teaser__title {
    &::after {
        width: 100%;
    }
}
</style>