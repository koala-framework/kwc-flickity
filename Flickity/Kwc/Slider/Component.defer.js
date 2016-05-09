"use strict";
var $ = require('jQuery');
var onReady = require('kwf/on-ready');
var flickity = require('flickity');

onReady.onRender('.kwcClass', function(el) {
    var config = el.data('config');
    var elements = el.find('.kwcClass__listItem');
    elements.first().css('visibility', 'visible');
    if (config['lazyImages'] > 0) {
        for (var i=0; i <= parseInt(config['lazyImages']); i++) {
            if (i > parseInt(elements.length/2)) break;
            elements.eq(i).css('visibility', 'visible');
            elements.eq(elements.length - i).css('visibility', 'visible');
        }
    } else {
        elements.css('visibility', 'visible');
    }

    var flkty = new flickity(el[0], config);
    el.data('flkty', flkty);

    flkty.on( 'cellSelect', function() {
        if ((flkty.selectedIndex + config['lazyImages']) <= (flkty.cells.length - 1) &&
            elements.eq(flkty.selectedIndex + config['lazyImages']).css('visibility') != 'visible') {
            elements.eq(flkty.selectedIndex + config['lazyImages']).css('visibility', 'visible');
        } else if ((flkty.selectedIndex - config['lazyImages']) >= 0 &&
            elements.eq(flkty.selectedIndex - config['lazyImages']).css('visibility') != 'visible') {
            elements.eq(flkty.selectedIndex - config['lazyImages']).css('visibility', 'visible');
        }
        onReady.callOnContentReady(el, { action: 'show' });
    });
}, { checkVisibility: true });
