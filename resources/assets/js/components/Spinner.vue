<template lang="pug">
.spinner.uk-flex.uk-flex-center.uk-flex-middle
    .spinner__icon.uk-margin-auto
</template>

<script>
import { inject, onMounted } from 'vue';
import { spinner } from 'uikit';

export default {
    setup() {
        const sprites = inject('sprites');

        onMounted(() => {
            spinner('.spinner__icon', { ratio: 3 });
        });
        return {
            sprites
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

.spinner {
    z-index: 1000;
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;

    &__icon {
        color: $purpleSaturate;
    }
}
</style>