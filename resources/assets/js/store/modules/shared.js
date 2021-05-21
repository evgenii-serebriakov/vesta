import * as types from '../mutation-types';
import { fetchData } from '@/js/api';

export const state = {
    sprites: '/assets/images/sprites.svg',
    navigation: [
        { text: 'Главная', icon: '#icon-home', path: '/' },
        { text: 'Видео', icon: '#icon-camera', path: '/video' },
        { text: 'Блог', icon: '#icon-news', path: '/posts' },
        { text: 'Отзывы', icon: '#icon-comment', path: '/reviews' },
        // { text: 'Panel', icon: '#icon-comment', path: '/eMdcJ5gCGwPbJRW7' }
    ],
    contacts: [],
    social: [],
    loading: false,
    error: null,
};

export const getters = {
    sprites: (state) => state.sprites,
    navigation: (state) => state.navigation,
    contacts: (state) => state.contacts,
    social: (state) => state.social,
    loading: (state) => state.loading,
};

export const mutations = {
    [types.IS_LOADING] (state, loading) {
        state.loading = loading;
    },
    [types.FETCH_SOCIAL_SUCCESS] (state, social) {
        state.social = social;
    },
    [types.FETCH_SOCIAL_FAILURE] (state, err) {
        state.social = [];
        state.error = err;
    },
    [types.FETCH_CONTACTS_SUCCESS] (state, contacts) {
        state.contacts = contacts;
    },
    [types.FETCH_CONTACTS_FAILURE] (state, err) {
        state.contacts = [];
        state.error = err;
    }
};

export const actions = {
    async fetchSocial ({ commit }) {
        try {
            const social = await fetchData('/api/social');

            commit(types.FETCH_SOCIAL_SUCCESS, social);
        } catch (err) {
            commit(types.FETCH_SOCIAL_FAILURE, err);
        }
    },
    async fetchContacts ({ commit }) {
        try {
            const contacts = await fetchData('/api/contacts');

            commit(types.FETCH_CONTACTS_SUCCESS, contacts);
        } catch (err) {
            commit(types.FETCH_CONTACTS_FAILURE, err);
        }
    }
};
