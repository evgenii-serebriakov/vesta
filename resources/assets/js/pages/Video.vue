<template lang="pug">
section.video.uk-section
    .uk-container.uk-position-relative
        .grid.uk-child-width-1-1.uk-grid-divider.uk-grid-match.uk-grid-small(class="uk-child-width-1-3@m uk-child-width-1-2@s")
            .video__col(v-if="!loading && videos && videos.length !== 0" v-for="item in videos" :key="item.id")
                article.teaser.uk-article.uk-card
                    router-link.teaser__link.uk-display-block(
                        :to="{ name: 'single-video', params: { id: item.id }}"
                    )
                        .teaser__image.uk-card-media-top
                            img(:src="item.image" :alt="item.alt")
                    
                        .teaser__body
                            h5.teaser__title.uk-card-title.uk-text-uppercase {{ item.title }}
        
        .video__empty(v-if="!loading && videos.length === 0")
            h2.uk-text-uppercase.uk-text-center.uk-text-muted Список видео пуст

        spinner.uk-position-absolute(v-if="loading")
</template>

<script>
import { onMounted, computed, watchEffect } from 'vue';
import { useStore } from 'vuex';
import { grid } from 'uikit';
import Spinner from '@/js/components/Spinner';

export default {
    name: 'Video',
    components: {
        Spinner
    },
    setup() {
        const store = useStore();
        store.dispatch('fetchVideos');

        const videos = computed(() => store.getters.videos);
        const loading = computed(() => store.getters.loading);

        watchEffect(() => videos.value);

        onMounted(() => {
            grid('.grid');
        });

        return {
            videos,
            loading
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