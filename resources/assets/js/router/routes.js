import { page } from '@/js/utils/path';
// console.log(path);
import { 
    HomePage,
    SinglePost,
    SingleVideo
} from '../pages';

export default [
    { path: '/', name: 'home', component: HomePage },
    { path: '/video', name: 'video', component: page('pages/Video') },
    { path: '/posts', name: 'posts', component: page('pages/Posts') },
    { path: '/reviews', name: 'reviews', component: page('pages/Reviews') },
    { 
        path: '/posts/:id', 
        name: 'single-post',
        component: SinglePost
    },
    { 
        path: '/video/:id', 
        name: 'single-video',
        component: SingleVideo
    },
    // { path: '*', redirect: HomePage },
];
