<template lang="pug">
scroll-up

#offcanvas-reveal
    .uk-offcanvas-bar.offcanvas-bar--padding
        drawer(:close-drawer="closeDrawer")

navbar(:open-drawer="openDrawer")

main.main-content
    router-view

navbar-bottom
</template>

<script>
import { offcanvas } from 'uikit';

import {
    // ref,
    onMounted,
    computed
} from 'vue';


import {
    Navbar,
    NavbarBottom,
    ScrollUp,
    Drawer,
    Spinner
} from '@/js/components';

export default {
    name: 'BasicLayout',
    components: {
        Navbar,
        NavbarBottom,
        ScrollUp,
        Drawer,
        Spinner
    },
    setup() {
        const createDrawer = computed(() => {
            return offcanvas('#offcanvas-reveal', {
                mode: 'reveal',
                overlay: true
            });
        });

        const openDrawer = () => {
            createDrawer.value.show();
        };
        
        const closeDrawer = () => {
            createDrawer.value.hide();
        };

        onMounted(() => {
            
        });

        return {
            openDrawer,
            closeDrawer
        };
    },
    created() {
        // console.log(this.$router);
    }
};
</script>

<style lang="scss" scoped>
.offcanvas-bar--padding {
    padding: 0;
}
</style>