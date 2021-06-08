import { offcanvas } from 'uikit';

class Drawer {
    constructor ({ selector, settings }) {
        this.offcanvas = offcanvas(selector, settings);
    }

    openDrawer () {
        console.log('Open drawer');
        this.offcanvas.show();
    }
    
    closeDrawer () {
        console.log('Close drawer');
        this.offcanvas.hide();
    }
    
    drawerHandler (selector, callback) {
        document.querySelector(selector)
            .addEventListener('click', callback);
    }
}

export default Drawer;