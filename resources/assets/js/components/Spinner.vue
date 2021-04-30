<template lang="pug">
.spinner
    svg.spinner__icon-svg
        use(:xlink:href="sprites + 'icon-spinner'")
</template>

<script>
import { inject } from 'vue';

export default {
    setup() {
        const sprites = inject('sprites');

        return {
            sprites
        };
    },
};
</script>