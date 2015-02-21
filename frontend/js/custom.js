$(document).ready(function () {

    (function randomFade() {
        var fadeDivs = $('.fade'),
        el = fadeDivs.eq(Math.floor(Math.random() * fadeDivs.length)); el.delay(1000).fadeIn('1500').delay(8000).fadeOut('1500', randomFade);
    })();


    $('.menu_click').click(function () {
        $('.first_level').slideToggle();
    });
    $('#second_level').click(function () {
        $('.first_level ul').slideToggle();
    });

    $('.single_model').each(function (i) {
        $(this).delay(1000 * i).fadeIn(1500);
    });

    $('.close_mask').click(function () {
        $('.big_video').fadeOut();
        $('#mask').delay(300).fadeOut();
        vimeoWrap = $('.big_video');
        vimeoWrap.html( vimeoWrap.html() );
    });

    $('#mask').click(function () {
        $('.big_video').fadeOut('slow');
        $('#mask').delay(500).fadeOut('slow');
        vimeoWrap = $('.big_video');
        vimeoWrap.html( vimeoWrap.html() );
    });

    $('.thumbs').click(function () {
        $('#mask').fadeIn('slow');
        $('.big_video').delay(500).fadeIn('slow');
    });

    var three = $('#three').width();
    
    var three_img = $('#three img').width();

});


