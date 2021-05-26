import { spinner, alert, close, scroll } from 'uikit';

// import { createApp } from 'vue';
// import router from '@/js/router';
// import store from './store';
// require('./bootstrap');

// import App from '@/js/components/App';

// createApp(App)
//     .use(store)
//     .use(router)
//     .mount('#app');

class App {
    constructor (props) {
        this.ratio = props.ratio;
        this.elemAsScroll = document.querySelector('.scroll-up__icon-svg');
        this.parentNode = this.elemAsScroll.parentNode;
        
    }

    spinner () {
        spinner('.spinner__icon', { ratio: this.ratio });
    }

    alert () {
        const popupMessage = alert('.alert-message');
        close('.alert-message__link');
        console.log(popupMessage);

        // setTimeout(() => popupMessage.close(), 1000);
    }

    scrollChange (quantity) {
        document.addEventListener('scroll', () => {
            if (document.documentElement.scrollTop >= quantity) {
                this.parentNode.classList.add('visible');
            } else {
                this.parentNode.classList.remove('visible');
            }
        });
    }

    scrollUp () {
        this.elemAsScroll.addEventListener('click', () => {
            scroll('.scroll-up');
        });
    }

    run () {
        this.spinner();
        this.alert();
        this.scrollChange(300);
        this.scrollUp();
    }

}

document.addEventListener('DOMContentLoaded', () => {
    const app = new App({ ratio: 3 });

    app.run();

});
