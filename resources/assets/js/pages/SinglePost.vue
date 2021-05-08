<template lang="pug">
section.post.uk-section
    .uk-container
        .uk-flex.uk-flex-wrap
            .uk-width-1-1(v-if="post.image")
                .post__image
                    img(:src="post.image", :alt="post.alt")

            .uk-width-1-1
                .uk-card
                    .uk-card-body
                        h2.post__caption.uk-text-uppercase {{ post.title }}
                        p.post__meta-info {{ post.date }}

                        p.post__message {{ post.message }}
</template>

<script>
import { computed, onMounted } from 'vue';
import { useStore } from 'vuex';

export default {
    setup() {
        const state = useStore();
        const post = computed(() => state.getters.post);

        onMounted(() => {
            console.log(post.value);
        });

        return {
            post: post.value
        };
    },
};
</script>