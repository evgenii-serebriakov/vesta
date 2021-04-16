<template lang="pug">

v-app
    v-navigation-drawer(
        app
        temporary
        v-model="isVisible"
    )
        drawer(:drawer="isVisible")

    scroll-up
    navbar(:drawer="isVisible")
    home
    Footer
    
</template>

<script>
import Navbar from './Navbar';
import Footer from './Footer';
import ScrollUp from './ScrollUp';
import Drawer from './Drawer';
import Home from '@/js/pages/home/Home';

export default {
    name: 'App',
    components: {
        Navbar,
        Home,
        Footer,
        ScrollUp,
        Drawer
    },
    setup() {
        const isVisible = false;

        return {
            isVisible
        };
    }
};
</script>
