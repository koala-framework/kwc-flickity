var flickity = require('flickity');
var focus = flickity.prototype.focus;
flickity.prototype.focus = function() {
    // use non-standard setActive for IE11. https://github.com/metafizzy/flickity/issues/651
    if ( this.element.setActive  ) {
        this.element.setActive();
        return;
    }
    // use default
    focus.apply( this, arguments );
};
