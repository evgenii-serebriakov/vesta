<template lang="pug">

v-app
    ScrollUp
    Navbar
    //- Drawer
    Home
    Footer
    
</template>

<script>
import Navbar from './Navbar';
import Footer from './Footer';
import ScrollUp from './ScrollUp';
// import Drawer from './Drawer';
import Home from '@/js/pages/home/Home';

export default {
    name: 'App',
    components: {
        Navbar,
        Home,
        Footer,
        ScrollUp,
        // Drawer
    }
};
</script>
