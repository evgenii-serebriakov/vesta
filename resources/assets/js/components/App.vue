<template lang="pug">

//-  <loading ref="loading" />

//- <transition name="page" mode="out-in">
//-   <component :is="layout" v-if="layout" />
//- </transition>

#offcanvas-reveal
    .uk-offcanvas-bar.offcanvas-bar--padding
        drawer(:close-drawer="closeDrawer")

scroll-up

navbar(:open-drawer="openDrawer")

main.main-content
    router-view

navbar-bottom

    
</template>

<script>
import {
    // ref,
    onMounted,
    provide,
    readonly,
    computed
} from 'vue';

import { offcanvas } from 'uikit';

import Navbar from './Navbar';
import NavbarBottom from './NavbarBottom';
import ScrollUp from './ScrollUp';
import Drawer from './Drawer';

import {
    contacts,
    images,
    social,
    sprites,
    navigation
} from '@/js/store/data';

export default {
    name: 'App',
    components: {
        Navbar,
        NavbarBottom,
        ScrollUp,
        Drawer
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

        provide('sprites', sprites);
        provide('navigation', readonly(navigation));
        provide('contacts', readonly(contacts));
        provide('social', readonly(social));
        provide('images', readonly(images));

        onMounted(() => {
          
        });

        return {
            openDrawer,
            closeDrawer
        };
    }
};
</script>

<style lang="scss" scoped>
.offcanvas-bar--padding {
    padding: 0;
}
</style>