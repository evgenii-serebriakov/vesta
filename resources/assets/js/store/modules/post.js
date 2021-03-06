import * as types from '../mutation-types';
import { orderBy } from 'lodash';

import {
    fetchData,
    fetchPost
} from '@/js/api';

export const state = {
    posts: [],
    post: null,
    error: null
};

export const getters = {
    post: (state) => state.post,
    posts: (state) => orderBy(state.posts, ['updated_at'],['desc'])
};

export const mutations = {
    [types.FETCH_POSTS_SUCCESS] (state, posts) {
        state.posts = posts;
    }, 
    [types.FETCH_POST_SUCCESS] (state, post) {
        state.post = post;
    },
    [types.FETCH_POSTS_FAILURE] (state, err) {
        state.posts = [];
        state.error = err;
    },
    [types.FETCH_POST_FAILURE] (state, err) {
        state.post = null;
        state.error = err;
    }
};

export const actions = {
    async fetchPosts ({ commit }) {
        commit(types.IS_LOADING, true);

        try {
            const posts = await fetchData('/api/posts');

            commit(types.FETCH_POSTS_SUCCESS, posts);
        } catch (err) {
            commit(types.FETCH_POSTS_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    },
    async fetchPost ({ commit }, id) {
        commit(types.IS_LOADING, true);

        try {
            const post = await fetchPost(`/api/posts/${id}`);

            commit(types.FETCH_POST_SUCCESS, post);
        } catch (err) {
            commit(types.FETCH_POST_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    }
};