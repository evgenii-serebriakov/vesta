export default [
    { path: '/', name: 'home', component: () => import(/* webpackChunkName: 'home' */  '@/js/pages/home/HomePage')},
    { path: '/video', name: 'video', component: () => import(/* webpackChunkName: 'video' */  '@/js/pages/Video') },
    { path: '/posts', name: 'posts', component: () => import(/* webpackChunkName: 'posts' */  '@/js/pages/Posts') },
    { path: '/reviews', name: 'reviews', component: () => import(/* webpackChunkName: 'reviews' */  '@/js/pages/Reviews') },
    { 
        path: '/posts/:id', 
        name: 'single-post',
        component: () => import(/* webpackChunkName: 'single-post' */  '@/js/pages/SinglePost')
    },
    { 
        path: '/video/:id', 
        name: 'single-video',
        component: () => import(/* webpackChunkName: 'single-video' */  '@/js/pages/SingleVideo')
    },
    {
        path: '/control-panel', 
        name: 'control-panel',
        component: () => import(/* webpackChunkName: 'control-panel' */  '@/js/pages/ControlPanel'),
        children: [
            {
                path: '/control-panel',
                name: 'welcome-panel',
                component: () => import(/* webpackChunkName: 'welcome-panel' */  '@/js/components/WelcomePanel')
            },
            {
                path: '/control-panel/:listPostId',
                name: 'list-posts',
                component: () => import(/* webpackChunkName: 'list-posts' */  '@/js/components/List/ListPosts'),
            },
            {
                path: '/control-panel/:postId',
                name: 'form-post',
                component: () => import(/* webpackChunkName: 'form-post' */  '@/js/components/Forms/FormPost')
            }
        ]
    },
    { path: '/:any(.*)/:path(.*)?', redirect: { name: 'home' } }
];
