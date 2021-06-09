import { offcanvas } from 'uikit';

class Drawer {
    constructor ({ selector, settings }) {
        this.offcanvas = offcanvas(selector, settings);
        this.openDrawer = this.openDrawer.bind(this);
        this.closeDrawer = this.closeDrawer.bind(this);
    }

    openDrawer () {
        this.offcanvas.show();
    }
    
    closeDrawer () {
        this.offcanvas.hide();
    }
    
    drawerHandler (selector, callback) {
        document.querySelector(selector)
            .addEventListener('click', callback);
    }
}

export default Drawer;