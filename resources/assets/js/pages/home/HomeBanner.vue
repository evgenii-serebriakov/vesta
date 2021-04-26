<template lang="pug">
section.banner
    .uk-container.uk-container-expand
        .uk-flex.uk-flex-center.uk-flex-middle(class="uk-flex-right@m")
            .uk-width-auto
                .banner__inner.uk-text-center
                    h2.banner__caption.white-line Душевное спокойствие
                    p.banner__subtitle.uk-margin-remove.uk-text-break это состояние гармонии со своим телом
</template>

<script>
import { inject, onMounted } from 'vue';
import { scrollspy } from 'uikit';

export default {
    name: 'HomeBanner',
    setup() {
        const sprites = inject('sprites');

        onMounted(() => {
            scrollspy('.banner__inner', {
                cls: 'uk-animation-slide-bottom-medium'
            });
        });
       
        return {
            sprites
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.banner {
    padding: rem(100) 0;
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: radial-gradient(circle at left center, rgba(185, 132, 246, 0.657) 75%, rgba(150, 23, 23, 0) 0%), url('/assets/images/water.jpg');

    @include media-laptop {
        padding: rem(150) 0;
        background-image: radial-gradient(circle at right center, rgba(185, 132, 246, 0.657) 70%, rgba(150, 23, 23, 0) 0%), url('/assets/images/water.jpg');
        background-size: cover;
        background-position: 0 0;
    }

    @include media-laptop-large {
        padding: rem(200) 0;
    }

    @include media-laptop-extra-large {
        background-image: radial-gradient(circle at right top, rgba(185, 132, 246, 0.657) 50%, rgba(150, 23, 23, 0) 0%), url('/assets/images/water.jpg');
    }

    &::before {
        top: 0;
        left: 0;
        position: absolute;
        display: block;
        content: ' ';
        width: 100%;
        height: 100%;
        background-image: url('/assets/images/line.svg');
        background-size: auto 90%;
        background-position: 20% 60%;
        background-repeat: no-repeat;

        @include media-laptop {
            background-position: -300% 60%;
        }

        @include media-laptop-large {
            background-position: 190% 60%;
        }

        @include media-laptop-extra-large {
            background-position: 115% 60%;
        }
    }

    &__inner {
        color: rgb(255, 255, 255);
        padding-right: rem(20);
    }

    &__caption {
        position: relative;
        font-size: rem(70);
        color: #fff;

        &::before {
            top: 170px;
        }

        @include media-breakpoint(694) {
            &::before {
                top: 90px;
            }
        }
    }

    &__subtitle {
        font-size: 35px;
        padding-top: rem(6);
    }
}

.icon-svg {
    width: 100%;
    transform: rotate(180deg);
    fill: rgb(180, 67, 255);
}
</style>