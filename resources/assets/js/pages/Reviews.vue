<template lang="pug">
section.reviews.uk-section
    .uk-container.uk-position-relative
        .grid.uk-child-width-1-1.uk-grid-divider(
            class="uk-child-width-1-3@m uk-child-width-1-2@s"
        )
            .reviews__col(
                v-for="item in reviews"
                :key="item.id" 
            )
                template(v-if="!loading && reviews && reviews.length !== 0")
                    a.reviews__link.uk-inline(
                        :href="`https://www.youtube-nocookie.com/embed/${item.video}`"
                        :data-caption="item.title"
                        data-type="iframe"
                    )
                        img.reviews__image(:src="item.image" :alt="item.alt")
                                    
        .reviews__empty(v-if="!loading && reviews && reviews.length === 0")
            h2.uk-text-uppercase.uk-text-center.uk-text-muted Список отзывов пуст

        spinner.uk-position-absolute(v-if="loading")    
</template>

<script>
import { onMounted, watchEffect, computed } from 'vue';
import { useStore } from 'vuex';
import { grid, lightbox } from 'uikit';
import Spinner from '@/js/components/Spinner';

export default {
    name: 'Reviews',
    components: {
        Spinner
    },
    setup() {
        const store = useStore();
        store.dispatch('fetchReviews');

        const reviews = computed(() => store.getters.reviews);
        const loading = computed(() => store.getters.loading);

        watchEffect(() => reviews.value);

        onMounted(() => {
            grid('.grid');
            lightbox('.grid', {
                animation: 'scale',
                toggle: '.reviews__link'
            });
        });

        return {
            reviews,
            loading
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.reviews {
    background-image: radial-gradient(circle at 0% 50%, #f8f8f8 50%, rgba(150, 23, 23, 0) 0%);
}

</style>