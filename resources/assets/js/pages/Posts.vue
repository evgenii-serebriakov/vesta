<template lang="pug">
section.posts.uk-section
    .uk-container.uk-position-relative
        .grid.uk-child-width-1-1.uk-grid-divider.uk-grid-match(class="uk-child-width-1-1@m")
            .post__col(v-for="item in posts" :key="item.id")
                template(v-if="!loading && posts && posts.length !== 0")
                    article.teaser.uk-article.article
                        router-link.teaser__link.uk-flex.uk-flex-column.uk-flex-wrap.uk-card.uk-card-default.uk-card-hover(
                            :to="{ name: 'single-post', params: { id: item.id }}"
                        )
                            .teaser__item-wrap.uk-card-media-top.uk-width-1-1(v-if="isImage(item.image)" class="uk-width-1-3@m")
                                .teaser__link
                                    img.teaser__img(:src="item.image", :alt="item.alt")
                        
                            .teaser__content.uk-flex.uk-flex-column.uk-width-1-1(class="uk-width-2-3@m")
                                .teaser__header.uk-card-headers
                                    h5.teaser__title.uk-card-title.uk-text-normal.uk-text-uppercase.decorating-line {{ item.title }}

                                    p.teaser__meta-info.uk-text-meta
                                        time(
                                            :datetime="item.updated_at"
                                            aria-label="Date of publication"
                                        ) {{ getDate(item.updated_at) }}

                                .teaser__body.uk-card-body.uk-flex-1
                                    p.teaser__desc.uk-text-break {{ item.message }}

                                .teaser__footer.uk-card-footer
                                    span.teaser__text.uk-text-uppercase.uk-text-middle Далее
                                    i.teaser__icon
                                        svg.teaser__icon-svg
                                            use(:xlink:href="sprites + '#icon-arrow-right'")

        .posts__empty(v-if="!loading && posts.length === 0")
            h2.uk-text-uppercase.uk-text-center.uk-text-muted Список записей пуст

        spinner.uk-position-absolute(v-if="loading")
</template>

<script>
import { 
    onMounted, 
    computed,
    watchEffect,
} from 'vue';
import { useStore } from 'vuex';
import { grid } from 'uikit';
import { isImage, getDate } from '@/js/utils';
import { orderBy } from 'lodash';

import Spinner from '@/js/components/Spinner';

export default {
    name: 'Posts',
    components: {
        Spinner
    },
    setup() {
        const store = useStore();
        
        store.dispatch('fetchPosts');

        const sprites = computed(() => store.getters.sprites);
        // const posts = computed(() => store.getters.posts);
        const posts = computed(() => orderBy(store.getters.posts, ['updated_at'],['desc']));
        const loading = computed(() => store.getters.loading);

        watchEffect(() => {
            posts.value;
        });

        onMounted(() => grid('.grid'));
        
        return {
            sprites,
            posts,
            loading,
            isImage,
            getDate
        };
    }
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