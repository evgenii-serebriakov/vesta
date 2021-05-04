<template lang="pug">
suspense
    template(#default)
        basic
    template(#fallback)
        spinner
</template>

<script>
import { defineAsyncComponent, provide, readonly } from 'vue';
import Spinner from './Spinner';

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
        Spinner,
        Basic: defineAsyncComponent(() => import('@/js/layouts/Basic'))
        // Basic: defineAsyncComponent({
        //     loader: () => import('@/js/layouts/Basic'),
        //     delay: 1000
        // })
        
    },
    setup() {
        provide('sprites', sprites);
        provide('navigation', readonly(navigation));
        provide('contacts', readonly(contacts));
        provide('social', readonly(social));
        provide('images', readonly(images));
    }
};
</script>
