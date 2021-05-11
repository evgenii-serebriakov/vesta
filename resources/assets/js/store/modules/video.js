import * as types from '../mutation-types';
import { _videos } from '@/js/api/data';

import {
    fetchData,
    fetchVideoApi
} from '@/js/api';

export const state = {
    videos: [],
    video: null,
    error: null
};

export const getters = {
    video: (store) => store.video,
    videos: (store) => store.videos
};

export const mutations = {
    [types.FETCH_VIDEOS_SUCCESS] (state, videos) {
        state.videos = videos;
    }, 
    [types.FETCH_VIDEO_SUCCESS] (state, video) {
        state.video = video;
    },
    [types.FETCH_VIDEOS_FAILURE] (state, err) {
        state.error = err;
    },
    [types.FETCH_VIDEO_FAILURE] (state, err) {
        state.error = err;
    }
};

export const actions = {
    async fetchVideos ({ commit }) {
        commit(types.IS_LOADING, true);

        try {
            const videos = await fetchData(_videos);

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
            const video = await fetchVideoApi(id);

            commit(types.FETCH_VIDEO_SUCCESS, video);
        } catch (err) {
            commit(types.FETCH_VIDEO_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    }
};