<template lang="pug">
section.single-video.uk-section
    article.uk-article
        .uk-container
            .uk-flex.uk-flex-wrap
                .uk-width-1-1(class="uk-width-1-2@m")
                    .single-video__box
                        transition(name="fade" mode="in-out")
                            img(
                                v-if="hasChanges"
                                class="single-video__img"
                                :src="video.image",
                                :alt="video.alt"
                            )
                        iframe(
                            class="single-video__frame"
                            :src="video.video"
                            width="100%"
                            height="315"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen
                            @load="onFrameLoading"
                        )

                .uk-width-1-1(class="uk-width-1-2@m")
                    .single-video__card.uk-card.uk-card-default.uk-card-hover.uk-margin
                        .uk-card-body
                            h2.single-video__caption.uk-card-title.uk-text-uppercase {{ video.title }}
                            p.single-video__meta-info.uk-text-meta
                                time(
                                    datetime="2004-07-24T18:18"
                                    aria-label="Date of publication"
                                ) {{ video.date }}
                            p.single-video__text.uk-text-break {{ video.message }}
</template>

<script>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';

export default {
    setup() {
        const store = useStore();
        const video = computed(() => store.getters.video);

        const isVisible = ref(true);
        const hasChanges = computed(() => isVisible);
        const onFrameLoading = () => isVisible.value = false;

        return {
            video: video.value,
            hasChanges: hasChanges.value,
            onFrameLoading
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.single-video {
    &__box {
        margin-bottom: rem(30);
        position: relative;
    }

    &__img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 315px;
    }

    &__caption {
        margin-bottom: 0;
        font-size: 28px;
    }

    &__meta-info {
        margin-bottom: rem(20);
    }

    &__text {
        font-size: 26px;
    }

    @include media-breakpoint(960) {
        &__box {
            margin-bottom: 0;
        }

        &__card {
            margin-left: rem(60);
        }
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>