const sprites = '/assets/images/sprites.svg';

const navigation = [
    {
        text: 'Главная', icon: '#icon-home', path: '/'
    },
    {text: 'Видео', icon: '#icon-camera', path: '/video'},
    {text: 'Блог', icon: '#icon-news', path: '/posts'},
    {text: 'Отзывы', icon: '#icon-comment', path: '/reviews'}
];

const contacts = [
    {title: 'Телефон', text: '8 (999) 899 43 33', icon: '#icon-phone', color: '#17c42e'},
    {title: 'Почта', text: 'exemple@mail.com', icon: '#icon-mail', color: '#22b9f5', id: 'contacts__text'},
    {title: 'Адрес', text: '216 street address, barisal, bd', icon: '#icon-map', color: '#be0000'}
];

const social = [
    {title: 'Youtube', text: 'Youtube', icon: '#icon-youtube', color: '#FF0000'},
    {title: 'Instagram', text: 'Instagram', icon: '#icon-instagram', color: '#8134AF'},
    {title: 'WhatsApp', text: 'WhatsApp', icon: '#icon-whatsapp', color: '#4FCE5D'},
    {title: 'Twitter', text: 'Twitter', icon: '#icon-twitter', color: '#55ACEE'},
    {title: 'Facebook', text: 'Facebook', icon: '#icon-facebook', color: '#3C5898'},
    {title: 'Вконтакте', text: 'VK', icon: '#icon-vk', color: '#5181B8'},
    {title: 'Viber', text: 'Viber', icon: '#icon-viber', color: '#665CAC'}
];

const cards = [
    {
        path: '/assets/images/massage_0.jpg',
        alt: 'bg-1',
        title: 'Lorem, ipsum dolor',
        text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati!'
    },
    {
        path: '/assets/images/massage_1.jpg',
        alt: 'bg-2',
        title: 'Lorem, ipsum dolor',
        text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati!'
    },
    {
        path: '/assets/images/massage_2.jpg',
        alt: 'bg-3',
        title: 'Lorem, ipsum dolor',
        text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati!'
    },
];

const images = [
    {
        path: '/assets/images/sity_bg.jpg',
        text: 'bg-1'
    },
    {
        path: '/assets/images/bg_0.jpg',
        text: 'bg-2'
    },
    {
        path: '/assets/images/bg_1.jpg',
        text: 'bg-3'
    },
];

export {
    images,
    sprites,
    navigation,
    social,
    cards,
    contacts
};