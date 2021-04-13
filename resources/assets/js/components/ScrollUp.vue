<template lang="pug">
.scroll-up
    svg.scroll-up__icon-svg(fill-rule="evenodd")
        use(:xlink:href="sprites + '#icon-arrow-up'")  
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

// === Scroll up ===
.scroll-up {
    position: fixed;
    right: 20px;
    bottom: 15px;
    z-index: 1000;
    transition: transform 0.3s ease 0s;
    transform: translateY(100px);

    &__icon-svg {
        width: 30px;
        height: 30px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        fill: rgb(134, 4, 255);

        &:hover {
            fill: $purpleSaturate;
        }
    }
}

.visible {
    transform: translateY(0);
}
// === / Scroll up ===
</style>