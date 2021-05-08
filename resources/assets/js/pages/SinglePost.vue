<template lang="pug">
section.post.uk-section
    article.uk-article
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
</template>

<script>
import { computed, onMounted } from 'vue';
import { useStore } from 'vuex';

export default {
    setup() {
        const state = useStore();
        const post = computed(() => state.getters.post);

        onMounted(() => {
            // console.log(post.value);
        });

        return {
            post: post.value
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.post {
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