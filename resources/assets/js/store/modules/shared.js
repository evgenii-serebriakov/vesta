import * as types from '../mutation-types';

export const state = {
    sprites: '/assets/images/sprites.svg',
    navigation: [
        {
            text: 'Главная', icon: '#icon-home', path: '/'
        },
        {text: 'Видео', icon: '#icon-camera', path: '/video'},
        {text: 'Блог', icon: '#icon-news', path: '/posts'},
        {text: 'Отзывы', icon: '#icon-comment', path: '/reviews'}
    ],
    contacts: [
        {title: 'Телефон', text: '8 (999) 899 43 33', icon: '#icon-phone', color: '#17c42e'},
        {title: 'Почта', text: 'exemple@mail.com', icon: '#icon-mail', color: '#22b9f5', id: 'contacts__text'},
        {title: 'Адрес', text: '216 street address, barisal, bd', icon: '#icon-map', color: '#be0000'}
    ],
    social: [
        {title: 'Youtube', text: 'Youtube', icon: '#icon-youtube', color: '#FF0000'},
        {title: 'Instagram', text: 'Instagram', icon: '#icon-instagram', color: '#8134AF'},
        {title: 'WhatsApp', text: 'WhatsApp', icon: '#icon-whatsapp', color: '#4FCE5D'},
        {title: 'Twitter', text: 'Twitter', icon: '#icon-twitter', color: '#55ACEE'},
        {title: 'Facebook', text: 'Facebook', icon: '#icon-facebook', color: '#3C5898'},
        {title: 'Вконтакте', text: 'VK', icon: '#icon-vk', color: '#5181B8'},
        {title: 'Viber', text: 'Viber', icon: '#icon-viber', color: '#665CAC'}
    ],
    loading: false,
    error: null
};


export const getters = {
    sprites: (state) => state.sprites,
    navigation: (state) => state.navigation,
    contacts: (state) => state.contacts,
    social: (state) => state.social,
    loading: (state) => state.loading
};

export const mutations = {
    [types.IS_LOADING] (state, loading) {
        state.loading = loading;
    }
};