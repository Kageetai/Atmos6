jQuery(function () {
    console.log('atmos-sphere');
    atmos();
    jQuery(window).resize(atmos);
});

function atmos() {
    var atmosSpheres = jQuery('.atmos-sphere');

    // calculate proper height based in width
    atmosSpheres.unbind('hover click').each(function (index, element) {
        jQuery(element).height(jQuery(element).width());
    });

    // attach click or hover events based on touch device or not
    if (isTouchDevice()) {
        atmosSpheres.click(function (event) {
            jQuery(event.target).parents('.atmos-sphere').addClass('active')
        });
    } else {
        atmosSpheres.hover(function (event) {
            jQuery(event.target).parents('.atmos-sphere').addClass('active')
        }, function (event) {
            jQuery(event.target).parents('.atmos-sphere').removeClass('active')
        });
    }
}

function isTouchDevice() {
    return 'ontouchstart' in window        // works on most browsers
        || navigator.maxTouchPoints;       // works on IE10/11 and Surface
}