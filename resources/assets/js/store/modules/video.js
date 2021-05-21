import * as types from '../mutation-types';
import { orderBy } from 'lodash';

import {
    fetchData,
    fetchVideo
} from '@/js/api';

export const state = {
    videos: [],
    video: null,
    error: null
};

export const getters = {
    video: (state) => state.video,
    videos: (state) => orderBy(state.videos, ['updated_at'],['desc'])
};

export const mutations = {
    [types.FETCH_VIDEOS_SUCCESS] (state, videos) {
        state.videos = videos;
    }, 
    [types.FETCH_VIDEO_SUCCESS] (state, video) {
        state.video = video;
    },
    [types.FETCH_VIDEOS_FAILURE] (state, err) {
        state.videos = [];
        state.error = err;
    },
    [types.FETCH_VIDEO_FAILURE] (state, err) {
        state.video = null;
        state.error = err;
    }
};

export const actions = {
    async fetchVideos ({ commit }) {
        commit(types.IS_LOADING, true);

        try {
            const videos = await fetchData('/api/video');

            commit(types.FETCH_VIDEOS_SUCCESS, videos);
        } catch (err) {
            commit(types.FETCH_VIDEOS_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    },
    async fetchVideo ({ commit }, id) {
        commit(types.IS_LOADING, true);

        try {
            const video = await fetchVideo(`/api/video/${id}`);

            commit(types.FETCH_VIDEO_SUCCESS, video);
        } catch (err) {
            commit(types.FETCH_VIDEO_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    }
};