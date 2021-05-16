<template lang="pug">
section.posts()
     .uk-container-large.uk-margin-auto.posts__inner
        .isoteric
            i.isoteric__icon
                svg.isoteric__icon-svg
                    use(:xlink:href="sprites + '#icon-isoteric'")

        h2.posts__title.uk-text-uppercase.uk-text-bold.decorating-line Последние посты

        div(class="uk-slider-container-offset slider")
            div(
                v-if="posts && posts.length !== 0"
                class="uk-position-relative uk-visible-toggle uk-light" 
                tabindex="-1"
            )

                ul(class="uk-slider-items uk-child-width-* uk-child-width-1-2@s uk-child-width-1-3@m uk-grid")
                    li(v-for="item in posts" :key="item.id")
                        article.teasers.uk-article.article  
                            router-link.teasers__link.uk-display-block.uk-card.uk-card-default.uk-card-hover(
                                :to="{ name: 'single-post', params: { id: item.id }}"
                            )
                                .teasers__item-wrap.uk-card-media-top
                                    .teasers__link
                                        img.teasers__img(:src="item.image", :alt="item.alt")
                            
                                .teasers__content.uk-card-body
                                    h5.teasers__title.uk-card-title.uk-text-normal.uk-text-uppercase {{ item.title }}

                                    p.teasers__meta-info.uk-text-meta
                                        time(
                                            :datetime="item.updated_at"
                                            aria-label="Date of publication"
                                        ) {{ getDate(item.updated_at) }}
                                .teasers__footer.uk-card-footer
                                    span.teasers__text.uk-text-uppercase.uk-text-middle Далее
                                    i.teasers__icon
                                        svg.teasers__icon-svg
                                            use(:xlink:href="sprites + '#icon-arrow-right'")
                    

                a(class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous")

                a(class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next")


            ul(class="uk-slider-nav uk-dotnav uk-flex-center uk-margin")

        .separator-line
</template>

<script>
import { onMounted, computed, watchEffect } from 'vue';
import { useStore } from 'vuex';
import { slider } from 'uikit';
import { orderBy } from 'lodash';
import { getDate } from '@/js/utils';

export default {
    name: 'HomePostPreview',
    setup() {
        const store = useStore();
        store.dispatch('fetchPosts');

        const sprites = computed(() => store.getters.sprites);
        const posts = computed(() => orderBy(store.getters.posts, ['updated_at'],['desc']));

        watchEffect(() => posts.value);

        onMounted(() => {
            slider('.slider');
        });
        
        return {
            posts,
            sprites,
            getDate
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.posts {
    background-image: radial-gradient(circle at left bottom, #f8f8f8 49%, rgba(150, 23, 23, 0) 0%);

    &__inner {
        padding-top: 50px;
        padding-left: 15px;
        padding-right: 15px;
    }

    &__title {
        position: relative;
        color: $greyColor;
        margin-left: 15px;
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
        &__content {
            padding: 0.7rem 1rem;
        }

        &__title {
            font-size: 22px;
            color: $default-color;
            margin: 0;
        }

        &__meta-info {
            color: $greyColor;
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
}

</style>