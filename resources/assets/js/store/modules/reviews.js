import * as types from '../mutation-types';
import { orderBy } from 'lodash';

import {
    fetchData,
} from '@/js/api';

export const state = {
    reviews: [],
    error: null
};

export const getters = {
    reviews: (state) => orderBy(state.reviews, ['updated_at'],['desc'])
};

export const mutations = {
    [types.FETCH_REVIEWS_SUCCESS] (state, reviews) {
        state.reviews = reviews;
    }, 
    [types.FETCH_REVIEWS_FAILURE] (state, err) {
        state.reviews = [];
        state.error = err;
    }
};

export const actions = {
    async fetchReviews ({ commit }) {
        commit(types.IS_LOADING, true);

        try {
            const reviews = await fetchData('/api/reviews');

            commit(types.FETCH_REVIEWS_SUCCESS, reviews);
        } catch (err) {
            commit(types.FETCH_REVIEWS_FAILURE, err);
        } finally {
            commit(types.IS_LOADING, false);
        }
    }
};