<template lang="pug">
section.banner
    v-container.banner__wrap
        v-row.banner__row(justify="end" align="center")
            v-col(cols="auto")
                .banner__inner.text-center.pr-10
                    h2.banner__caption.white-line Душевное спокойствие
                    p.masage__subtitle.mb-0.pt-2.text-wrap это состояние гармонии со своим телом

    //- .curved-line
    //-     svg.icon-svg
    //-         use(:xlink:href="sprites + '#icon-curved-line'")

</template>

<script>
export default {
    setup() {
        const sprites = '/assets/images/sprites.svg';
       
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
    height: rem(600);
    position: relative;
    background-size: auto 100%;
    background-image: radial-gradient(circle at left center, rgba(185, 132, 246, 0.657) 75%, rgba(150, 23, 23, 0) 0%), url('/assets/images/jpg/water.jpg');

    @include media-laptop {
        background-image: radial-gradient(circle at right center, rgba(185, 132, 246, 0.657) 70%, rgba(150, 23, 23, 0) 0%), url('/assets/images/jpg/water.jpg');
        background-size: cover;
        background-position: 0 0;
    }

    @include media-laptop-extra-large {
        background-image: radial-gradient(circle at right top, rgba(185, 132, 246, 0.657) 50%, rgba(150, 23, 23, 0) 0%), url('/assets/images/jpg/water.jpg');
    }

    &::before {
        top: 0;
        left: 0;
        position: absolute;
        display: block;
        content: ' ';
        width: 100%;
        height: 100%;
        background-image: url('/assets/images/jpg/line.svg');
        background-size: auto 90%;
        background-position: 20% 60%;

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

    &__wrap {
        max-width: 100%;
        height: inherit;
    }

    &__row {
        height: inherit;
    }

    &__inner {
        color: rgb(255, 255, 255);

        p {
            font-size: 35px;
        }
    }

    &__caption {
        position: relative;
        font-size: rem(70);
    }
}

.curved-line {
    background-color: #f5f5f5;

    // &::before {
    //     display: block;
    //     content: ' ';
    //     width: 100%;
    //     height: rem(200);
    //     background: linear-gradient(180deg, rgba(243, 79, 229, 0.322) 40%, rgba(243, 79, 229, 0.404) 80%);
    // }
}

.icon-svg {
    width: 100%;
    transform: rotate(180deg);
    fill: rgb(180, 67, 255);
    // fill: none;
}
</style>