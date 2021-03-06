import {
    spinner,
    alert,
    close,
    scroll,
    slider, 
    grid,
    scrollspy,
    sticky,
    lightbox
} from 'uikit';

import Drawer from './drawer';

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
        this.scrollspy = props.scrollspy;
        this.sticky = props.sticky;
        this.lightbox = props.lightbox;
        
        this.elemAsScroll = document.querySelector(this.scroll.target);

        this.drawer = props.drawer;
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
        grid(options.selector);
    }
    
    createSlider (options) {
        slider(options.selector);
    }
    
    createSpinner (options) {
        spinner(options.selector, { ratio: options.ratio });
    }

    scrollSpy (options) {
        options.selectors.forEach(
            (selector) => scrollspy(selector, options.settings)
        );
    }

    stickHeader (options) {
        sticky(options.selector);
    }

    createLightbox (options) {
        lightbox(options.selector, options.settings);
    }

    run () {
        this.scrollChange(this.scroll.quantity);
        this.scrollUp(this.scroll);
        this.createAlert(this.alert);
        this.createSpinner(this.spinner);
        this.createSlider(this.slider);
        this.createGrid(this.grid);
        this.scrollSpy(this.scrollspy);
        this.stickHeader(this.sticky);
        this.createLightbox(this.lightbox);
        
        this.drawer.drawerHandler('.trigger__btn', this.drawer.openDrawer);
        this.drawer.drawerHandler('.close__btn', this.drawer.closeDrawer);

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
        selector: '.slider'
    },
    grid: {
        selector: '.grid'
    },
    scroll: {
        selector: '.scroll-up',
        target: '.scroll-up__icon-svg',
        quantity: 300
    },
    scrollspy: {
        selectors: ['.banner__inner', '.massage__inner'],
        settings: {
            cls: 'uk-animation-slide-bottom-medium'
        }
    },
    sticky: {
        selector: '.header__main'
    },
    lightbox: {
        selector: '.lightbox',
        setting:  {
            animation: 'scale',
            toggle: '.reviews__link'
        }
    }, 
       
   
    drawer: new Drawer({
        selector: '#offcanvas-reveal',
        settings: {
            mode: 'reveal',
            overlay: true
        } 
    })
});

app.run();
           