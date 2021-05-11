import { createStore } from 'vuex';
import * as posts from './modules/post';
import * as videos from './modules/video';
import * as shared from './modules/shared';
import * as reviews from './modules/reviews';

export default createStore({
    modules: {
        posts,
        videos,
        shared,
        reviews
    },
    devtools: true
});