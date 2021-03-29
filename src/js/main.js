import $ from 'jquery';
import Slideout from 'slideout';

class Layout {
    constructor(options) {
        this.slider = options.slider;
    }

    static handlerEvents(instance) {
        const close = function (e) {
            e.preventDefault();
            instance.close();
        };

        return {
            beforeopen() {
                $(this.panel).addClass('panel-open');
            },
            open() {
                $(this.panel).one('click', close);
            },
            beforeclose() {
                $(this.panel).removeClass('panel-open');
            }
        };
    }

    static createSidebar(config) {
        const slideout = new Slideout(config);
        const handlers = Layout.handlerEvents(slideout);

        $.each(handlers, (i, handler) => {
            slideout.on(i, handler);
        });

        $('.trigger').on('click', () => {
            slideout.toggle();
        });

        $('.close__btn').on('click', () => {
            slideout.close();
        });

        slideout.open();
    }

    scrollToTop() {
        $(window).on('scroll', () => {
            if ($(window).scrollTop() >= 100) {
                $('to-top').addClass('visible');
            } else {
                $('to-top').removeClass('visible');
            }
        });
    }

    init() {
        Layout.createSidebar(this.slider);
    }
}

$(function () {

    const layout = new Layout({
        slider: {
            'panel': document.getElementById('main'),
            'menu': document.getElementById('menu'),
            'padding': 256,
            'tolerance': 70
        }
    });

    layout.init();

});
