<template lang="pug">
section.banner
    v-container(fluid)
        v-row(justify="end")
            v-col(cols="auto")
                .banner__inner.text-center
                    h2.banner__caption Душевное спокойствие
                    p.masage__subtitle.mb-0.pt-2.text-h6.text-wrap это состояние гармонии со своим телом

.curved-line
    svg.icon-svg
        use(:xlink:href="sprites + '#icon-curved-line'")

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
    position: relative;
    background-image: url('/assets/images/jpg/massage_bg.jpg');
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: cover;
    padding: rem(100) 0;
}

.curved-line {
    background-color: #f5f5f5;

    &::before {
        display: block;
        content: ' ';
        width: 100%;
        height: rem(200);
        background: linear-gradient(180deg, rgba(243, 79, 229, 0.322) 40%, rgba(243, 79, 229, 0.404) 80%);
    }
}

.icon-svg {
    width: 100%;
    transform: rotate(180deg);
    fill: rgba(245, 161, 238, 0.25);
}
</style>