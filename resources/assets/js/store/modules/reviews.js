import * as types from '../mutation-types';
import { _reviews } from '@/js/api/data';

import {
    fetchData,
} from '@/js/api';

export const state = {
    reviews: [],
    error: null
};

export const getters = {
    reviews: (store) => store.reviews
};

export const mutations = {
    [types.FETCH_REVIEWS_SUCCESS] (state, reviews) {
        state.reviews = reviews;
    }, 
    [types.FETCH_REVIEWS_FAILURE] (state, err) {
        state.error = err;
    },
  
};

export const actions = {
    async fetchReviews ({ commit }) {
        commit(types.IS_LOADING, true);

        try {
            const reviews = await fetchData(_reviews);

            commit(types.FETCH_REVIEWS_SUCCESS, reviews);
        } catch (err) {
            commit(types.FETCH_REVIEWS_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    }
};