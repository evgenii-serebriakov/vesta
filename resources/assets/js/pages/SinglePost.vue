<template lang="pug">
section.post.uk-section.uk-position-relative
    article.uk-article(v-if="!loading && post !== null")
        .uk-container.uk-container-small
            .uk-flex.uk-flex-wrap.uk-flex-center
                .uk-width-1-1(v-if="post.image")
                    .post__image
                        img(:src="post.image", :alt="post.alt")

                .uk-width-1-1
                    .uk-card.uk-card-default.uk-card-hover
                        .uk-card-body
                            h2.post__caption.uk-text-uppercase.uk-margin-remove.decorating-line  {{ post.title }}
                            p.post__meta-info.uk-text-meta
                                time(
                                    datetime="2004-07-24T18:18"
                                    aria-label="Date of publication"
                                ) {{ post.date }}

                            p.post__message.uk-text-break {{ post.message }}
    spinner.uk-position-absolute(v-else)
</template>

<script>
import { computed, onMounted, watchEffect } from 'vue';
import { useRoute } from 'vue-router';
import { useStore } from 'vuex';
import Spinner from '@/js/components/Spinner';

export default {
    name: 'SinglePost',
    components: {
        Spinner
    },
    setup() {
        const store = useStore();
        const route = useRoute();
        store.dispatch('fetchPost', route.params.id);

        const post = computed(() => store.getters.post);
        const loading = computed(() => store.getters.loading);

        watchEffect(() => {
            post.value;
        });

        onMounted(() => {
            
        });

        return {
            post,
            loading
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.post {
    background-image: radial-gradient(circle at 0% 50%, #f8f8f8 50%, rgba(150, 23, 23, 0) 0%);

    &__image {
        margin-bottom: rem(40);
    }

    &__caption {
        position: relative;
        font-size: 28px;

        &::before {
            top: 59px;
            background: #e5e5e5;
        }
    }

    &__message {
        padding-top: rem(40);
        font-size: 26px;
    }
}
</style>