<template lang="pug">
suspense
    template(#default)
        basic
    template(#fallback)
        spinner
</template>

<script>
import { defineAsyncComponent  } from 'vue';
import Spinner from './Spinner';

export default {
    name: 'App',
    components: {
        Spinner,
        Basic: defineAsyncComponent(() => import('@/js/layouts/Basic'))
        // Basic: defineAsyncComponent({
        //     loader: () => import('@/js/layouts/Basic'),
        //     delay: 1000
        // })
        
    },
    setup() {
        // To do
    }
};
</script>
