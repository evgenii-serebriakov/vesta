import $ from 'jquery';
import Slideout from 'slideout';

class Layout {
    constructor(options) {
        this.slider = options.slider;
        this.screenWidth = window.screen.width;
        this.target = $('.sidebar');
    }

    static handlerEvents(instance) {
        const close = function (e) {
            e.preventDefault();
            instance.close();
        };

        return {
            beforeopen() {
                $(this.panel).addClass('panel-open');

                if ($('.panel').hasClass('panel-open')) {
                    $('.scroll-up').css({
                        display: 'none',
                        opacity: 0
                    });
                }
            },
            open() {
                $(this.panel).on('click', close);
            },
            beforeclose() {
                $(this.panel).removeClass('panel-open');
                $(this.panel).off('click', close);

                $('.scroll-up').css({
                    display: 'block',
                    opacity: 1
                });
            }
        };
    }

    static createSidebar(config) {
        const slideout = new Slideout(config);
        const handlers = Layout.handlerEvents(slideout);

        $('.trigger__btn').on('click', () => {
            slideout.open();
        });

        $('.close__btn').on('click', () => {
            slideout.close();
        });

        $.each(handlers, (i, handler) => {
            slideout.on(i, handler);
        });
        // slideout.open();
    }

    static scrollUp(quantity) {
        function handler() {
            $(window).scrollTop(0);
        }

        $('.scroll-up').on('click', handler);

        $(window).on('scroll', () => {
            if ($(window).scrollTop() >= quantity) {
                $('.scroll-up').addClass('visible');
            } else {
                $('.scroll-up').removeClass('visible');
            }
        });
    }

    init() {
        const widthScreen = this.screenWidth >= '992';

        if (!widthScreen) {
            this.target.remove();
        } else {
            Layout.createSidebar(this.slider);
        }

        Layout.scrollUp(100);
    }
}

$(function () {

    const layout = new Layout({
        slider: {
            'panel': document.querySelector('.wrapper'),
            'menu': document.getElementById('menu'),
            'padding': 256,
            'tolerance': 70
        }
    });

    layout.init();

});
