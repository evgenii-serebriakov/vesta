// import { path } from '@/js/utils/path';
// console.log(path);

import { 
    HomePage,
    Posts,
    Video,
    Reviews
} from '../pages';
// function page (path) {
//     return () => import(/* webpackChunkName: '' */ `@/js/${path}`);
// }


// console.log(import);

export default [
    // { path: '/', name: 'home', component: page('pages/home/HomePage.vue') },
    { path: '/', name: 'home', component: HomePage },
    { path: '/video', name: 'video', component: Video },
    { path: '/posts', name: 'posts', component: Posts },
    { path: '/reviews', name: 'reviews', component: Reviews },
    // { path: '*', component: HomePage },
];
