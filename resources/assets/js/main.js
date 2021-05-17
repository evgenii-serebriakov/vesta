import { createApp } from 'vue';
import router from '@/js/router';
import store from './store';
require('./bootstrap');

import App from '@/js/components/App';

createApp(App)
    .use(store)
    .use(router)
    .mount('#app');

// "unit-allowed-list": [
//     "em",
//     "rem",
//     "%",
//     "px",
//     "vh",
//     "vm",
//     "vw",
//     "vmax",
//     "vmin",
//     "deg",
//     "s"
// ]
