import { defineAsyncComponent } from 'vue';

/**
 * @param {String} path
 */
export const page = (path) => (
    defineAsyncComponent({
        loader: () => import(/* webpackChunkName: '' */  `@/js/${path}`),
        delay: 1000,
    })
);