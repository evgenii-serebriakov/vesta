import { createStore } from 'vuex';
import * as posts from './modules/post';
import * as videos from './modules/video';
import * as shared from './modules/shared';

export default createStore({
    modules: {
        posts,
        videos,
        shared
    },
    devtools: true
});