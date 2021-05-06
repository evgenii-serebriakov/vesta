<template lang="pug">
.scroll-up(:class="{ visible: isScrollable }")
    svg.scroll-up__icon-svg(@click="scrollUp" fill-rule="evenodd")
            use(:xlink:href="sprites + '#icon-arrow-up'")  
</template>

<script>
import {
    inject,
    onMounted,
    watchEffect,
    ref 
} from 'vue';
import { scroll } from 'uikit';

export default {
    name: 'ScrollUp',

    setup() {
        const isScrollable = ref(false);
        const sprites = inject('sprites');

        const scrollUp = () => scroll('.scroll-up');

        const scrollChange = (quantity) => {
            document.addEventListener('scroll', () => {
                if (document.documentElement.scrollTop >= quantity) {
                    isScrollable.value = true;
                } else {
                    isScrollable.value = false;
                }
            });
        };

        watchEffect(() => {
            scrollChange(300);
        });

        onMounted(()=> {
            // console.dir(scroll);
        });

        return {
            sprites,
            scrollUp,
            isScrollable
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

// === Scroll up ===
.scroll-up {
    position: fixed;
    right: 40px;
    bottom: 40px;
    z-index: 10;
    transition: transform 0.3s ease 0s;
    transform: translateY(100px);

    &__icon-svg {
        width: 35px;
        height: 35px;
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