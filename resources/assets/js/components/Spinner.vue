<template lang="pug">
.spinner.uk-flex.uk-flex-center.uk-flex-middle
    .spinner__icon.uk-margin-auto
</template>

<script>
import { useStore } from 'vuex';
import { spinner } from 'uikit';

export default {
    name: 'Spinner',
    props: {
        ratio: {
            type: Number,
            default: 3
        }
    },
    setup() {
        const store = useStore();
        const sprites = store.state.shared.sprites;
        
        return {
            sprites
        };
    },
    mounted() {
        spinner('.spinner__icon', { ratio: this.ratio });
    }
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