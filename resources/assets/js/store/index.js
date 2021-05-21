import { createStore } from 'vuex';
import * as posts from './modules/post';
import * as videos from './modules/video';
import * as shared from './modules/shared';
import * as reviews from './modules/reviews';

const isDev = process.env.NODE_ENV !== 'production';

export default createStore({
    modules: {
        posts,
        videos,
        shared,
        reviews
    },
    devtools: isDev,
    strict: isDev
});