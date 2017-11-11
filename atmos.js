jQuery(function() {
    console.log('atmos-sphere');
    atmosWidth();
    jQuery(window).resize(atmosWidth);
});

function atmosWidth() {
    jQuery('.atmos-sphere').each(function(index, element) {
        jQuery(element).height(jQuery(element).width());
    });
}