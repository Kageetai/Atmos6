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

    if (isTouchDevice()) {
        // click events on touch devices, first attach .active and only then go to href
        atmosSpheres.click(function (event) {
            var atmosSphere = jQuery(event.target).closest('.atmos-sphere');
            if (atmosSphere.hasClass('active') && atmosSphere.attr('data-href')) {
                window.location.href = atmosSphere.attr('data-href');
            } else {
                atmosSphere.toggleClass('active');
            }
        });
    } else {
        // hover and click events for attaching .active and going to href
        atmosSpheres.hover(function (event) {
            jQuery(event.target).closest('.atmos-sphere').addClass('active');
        }, function (event) {
            jQuery(event.target).closest('.atmos-sphere').removeClass('active');
        });
        atmosSpheres.click(function (event) {
            var atmosSphere = jQuery(event.target).closest('.atmos-sphere');
            if (atmosSphere.hasClass('active') && atmosSphere.attr('data-href')) {
                window.location.href = atmosSphere.attr('data-href');
            }
        })
    }
}

function isTouchDevice() {
    return 'ontouchstart' in window        // works on most browsers
        || navigator.maxTouchPoints;       // works on IE10/11 and Surface
}