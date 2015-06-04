$('#detalhes a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});




//initiate the plugin and pass the id of the div containing gallery images 
$("#zoom_03").elevateZoom({gallery: 'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});
//pass the images to Fancybox 
$("#zoom_03").bind("click", function (e) {
    var ez = $('#zoom_03').data('elevateZoom');
    $.fancybox(ez.getGalleryList());
    return false;
});


/*******************************
 * Slide horizontal da Página Inicial
 *******************************/
$(function () {
    $('.jcarousel').jcarousel();
});
