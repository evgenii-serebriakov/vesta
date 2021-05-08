require('./bootstrap');
import { createApp } from 'vue';
import router from '@/js/router';
import store from './store';

import App from '@/js/components/App';

createApp(App)
    .use(store)
    .use(router)
    .mount('#app');
