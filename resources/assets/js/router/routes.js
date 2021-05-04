import { page } from '@/js/utils/path';

export default [
    { path: '/', name: 'home', component: page('pages/home/HomePage') },
    { path: '/video', name: 'video', component: page('pages/Video') },
    { path: '/posts', name: 'posts', component: page('pages/Posts') },
    { path: '/reviews', name: 'reviews', component: page('pages/Reviews') },
    { 
        path: '/posts/:id', 
        name: 'single-post',
        component: page('pages/SinglePost')
    },
    { 
        path: '/video/:id', 
        name: 'single-video',
        component: page('pages/SingleVideo')
    },
    { path: '/:pathMatch(.*)', redirect: { name: 'home' } }
];
