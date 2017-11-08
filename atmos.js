jQuery(function() {
    console.log('atmos-sphere');
    jQuery('.atmos-sphere').each(function(index, element) {
        jQuery(element).height(jQuery(element).width());
    });
});