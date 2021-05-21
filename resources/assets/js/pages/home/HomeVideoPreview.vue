<template lang="pug">
section.videos
section.videos
    .uk-container-large.uk-margin-auto.videos__inner
        .isoteric
            i.isoteric__icon
                svg.isoteric__icon-svg
                    use(:xlink:href="sprites + '#icon-isoteric'")

        h2.videos__title.uk-text-uppercase.uk-text-bold.decorating-line Последние видео
        //- Slider start
        div(class="uk-slider-container-offset slider")

            div(
                v-if="videos && videos.length !== 0"
                class="uk-position-relative uk-visible-toggle uk-light"
                tabindex="-1"
            )

                ul(class="uk-slider-items uk-child-width-* uk-child-width-1-2@s uk-child-width-1-3@m uk-grid")
                    li(v-for="item in videos" :key="item.id")
                        article.teasers.uk-article.uk-card
                            router-link.teasers__link.uk-display-block(
                                :to="{ name: 'single-video', params: { id: item.id }}"
                            )
                                .teasers__image.uk-card-media-top
                                    img(:src="item.image" :alt="item.alt")
                            
                                .teasers__body
                                    h5.teasers__title.uk-card-title.uk-text-uppercase {{ item.title }}
                   

                a(class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous")

                a(class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next")


            ul(class="uk-slider-nav uk-dotnav uk-flex-center uk-margin")
        //- Slider end

        .separator-line
</template>

<script>
import { onMounted, computed, watchEffect } from 'vue';
import { useStore } from 'vuex';
import { slider } from 'uikit';

export default {
    name:'HomeVideoPreview',
    setup() {
        const store = useStore();
        store.dispatch('fetchVideos');

        const sprites = computed(() => store.getters.sprites);
        const videos = computed(() => store.getters.videos);

        watchEffect(() => videos.value);

        onMounted(() => {
            slider('.slider', { center: false, finite: false });
        });
        
        return {
            sprites,
            videos
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.videos {
    background-image: radial-gradient(circle at 100% 0%, #f8f8f8 50%, rgba(150, 23, 23, 0) 0%);

    &__inner {
        padding-top: 50px;
        padding-left: 15px;
        padding-right: 15px;
    }

    &__title {
        position: relative;
        color: $greyColor;
        margin-left: 15px;
        margin-top: rem(20);
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

    .teasers:hover .teasers__title {
        &::after {
            width: 100%;
        }
    }
}

</style>