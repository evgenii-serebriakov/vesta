import {
    spinner,
    alert,
    close,
    scroll,
    slider, 
    grid
} from 'uikit';

// import { createApp } from 'vue';
// import router from '@/js/router';
// import store from './store';
// require('./bootstrap');

// import App from '@/js/components/App';

// createApp(App)
//     .use(store)
//     .use(router)
//     // .mount('#app');

class App {
    constructor (props) {
        this.spinner = props.spinner;
        this.slider = props.slider;
        this.grid = props.grid;
        this.scroll = props.scroll;
        this.alert = props.alert;

        this.elemAsScroll = document.querySelector(this.scroll.target);
    }

    createAlert (options) {
        const popupMessage = alert(options.selector);
        close(options.close);
        console.log(popupMessage);

        // setTimeout(() => popupMessage.close(), 1000);
    }

    scrollChange (quantity) {
        const parentNode = this.elemAsScroll.parentNode;

        document.addEventListener('scroll', () => {
            if (document.documentElement.scrollTop >= quantity) {
                parentNode.classList.add('visible');
            } else {
                parentNode.classList.remove('visible');
            }
        });
    }

    scrollUp (options) {
        this.elemAsScroll.addEventListener('click', () => {
            scroll(options.selector);
        });
    }

    createGrid (options) {
        options.selectors.forEach((selector) => grid(selector));
    }
    
    createSlider (options) {
        options.selectors.forEach((selector) => slider(selector));
    }
    
    createSpinner (options) {
        spinner(options.selector, { ratio: options.ratio });
    }

    run () {
        this.scrollChange(this.scroll.quantity);
        this.scrollUp(this.scroll);
        this.createAlert(this.alert);
        this.createSpinner(this.spinner);
        this.createSlider(this.slider);
        this.createGrid(this.grid);
    }

}

const app = new App({
    alert: {
        selector: '.alert-message', 
        close: '.alert-message__link'
    },
    spinner: {
        selector: '.spinner__icon', 
        ratio: 3 
    },
    slider: {
        selectors: ['.slider']
    },
    grid: {
        selectors: ['.grid']
    },
    scroll: {
        selector: '.scroll-up',
        target: '.scroll-up__icon-svg',
        quantity: 300
    }
});

app.run();