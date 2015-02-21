jQuery(document).ready(function ($) {

    //slider 2

    var slideCount2 = $('#slider_2 .slider2 div').length;
    var slideWidth2 = $('#slider_2 .slider2 div').width();
    var slideHeight2 = $('#slider_2 .slider2 div').height();
    var sliderUlWidth2 = slideCount2 * slideWidth2;

    var marginTop = $('#slider').height();
    //alert(marginTop);
    //$('#slider_2').css("top", marginTop + 65);

    $('#slider_2').css({ height: slideHeight2 });
    sliderUlWidth2 = sliderUlWidth2 + 500;
    $('#slider_2 .slider2').css({ width: sliderUlWidth2 });

    if (sliderUlWidth2 <= 1000) {
        $('a.control_prev_2, a.control_next_2').css('display', 'none');
        var a = 1000 - sliderUlWidth2; a = a / 2;
        $('#slider_2 .slider2').css({ marginLeft: a });
    }



    //$('#slider_2 ul li:last-child').prependTo('#slider_2 ul');

    function moveLeft2() {
        $('#slider_2 .slider2').animate({
            left: +slideWidth2
        }, 200, function () {
            $('#slider_2 .slider2 div:last-child').prependTo('#slider_2 .slider2');
            $('#slider_2 .slider2').css('left', '');
        });
    };

    function moveRight2() {
        $('#slider_2 .slider2').animate({
            left: -slideWidth2
        }, 200, function () {
            $('#slider_2 .slider2 div:first-child').appendTo('#slider_2 .slider2');
            $('#slider_2 .slider2').css('left', '');
        });
    };

    $('a.control_prev_2').click(function () {
        moveLeft2();
    });

    $('a.control_next_2').click(function () {
        moveRight2();
        stop_slider();
    });

    $('.slider2 div').click(function () {
        var id = this.id;

        $('.active').removeClass('active').addClass('oldActive');
        //if ($('.oldActive').is(':last-child')) {
        //    $('.slide').first().addClass('active');
        //} else {
        $('#main_' + id).addClass('active');
        //}
        $('.oldActive').removeClass('oldActive');
        $('.slide').fadeOut(speed);
        $('.active').fadeIn(speed);
        margin_adjust();
        selected();


    });




    var speed = 500;
    var autoswitch = true;
    var autoswitch_speed = 5000;

    $(".slide").first().addClass("active");
    $(".slide").hide;
    $(".active").show();
    $('#next').on('click', nextSlide);
    $('#prev').on('click', prevSlide);

    function margin_adjust() {
        $('#slider img').css({ marginLeft: 0 });
        var width_slider = $('#slider').width();
        var width_img = $('.active').width();
        var margin_img = width_slider - width_img;
        margin_img = margin_img / 2;
        $('.active').css({ marginLeft: margin_img });

    }

    //$('#prev').click(function () {
    //    var get_id = $('.active').id;
    //    //alert(get_id);
    //});

    margin_adjust();
    selected();

    function nextSlide() {
        $('.active').removeClass('active').addClass('oldActive');
        if ($('.oldActive').is(':last-child')) {
            $('.slide').first().addClass('active');
        } else {
            $('.oldActive').next().addClass('active');
        }
        $('.oldActive').removeClass('oldActive');
        $('.slide').fadeOut(speed);
        $('.active').fadeIn(speed);
        margin_adjust();
        selected();
        //moveRight2();
        stop();
        stop_slider();
        stop_thumbs();

    }

    function prevSlide() {
        $('.active').removeClass('active').addClass('oldActive');
        if ($('.oldActive').is(':first-child')) {
            $('.slide').last().addClass('active');
        } else {
            $('.oldActive').prev().addClass('active');
        }
        $('.oldActive').removeClass('oldActive');
        $('.slide').fadeOut(speed);
        $('.active').fadeIn(speed);
        margin_adjust();
        selected();
        //moveLeft2();
        stop();
        stop_thumbs();

    }


    function selected() {

        $(".active").each(function () {
            $('.slide2').css("border-top", "3px #fff solid");
            $('.slide2').css("padding-top", "3px");
            var active_id = $(this).attr('id');
            var arr = active_id.split('main_');
            var z = arr[1];
            //alert(z);
            $('#' + z).css("border-top", "3px #000 solid");
            $('#' + z).css("padding-top", "3px");
            var thumb_width = $('#slider_2').width();
            var offset = $('#' + z).offset().left;
            var offset_slider = $('#slide2').offset().left;
            var width_img = $('#' + z).width();
           // alert(thumb_width + '---' + offset + '---' + offset_slider + '-----' + width_img);
            alert(((thumb_width + offset_slider - offset)+20) + '-----' + width_img);
            if((thumb_width + offset_slider - offset-40) == (width_img)){
               $('.control_next_2').trigger('click'); 

            }
        });

    }

    var first_child = $('.slide').first().attr('id');
    var last_child = $('.slide').last().attr('id');

    var first_child2 = $('.slide2').first().attr('id');
    var last_child2 = $('.slide2').last().attr('id');

    function stop_slider() {
        $(last_child2).next().css("display", "none");
    }

    function stop() {
        var active_child = $('.active').attr('id');
        if (active_child == last_child) {
            $('#next').css("pointer-events", "none");
        }
        else {
            $('#next').css("pointer-events", "auto");
        }

        if (active_child == first_child) {
            $('#prev').css("pointer-events", "none");

        }
        else {
            $('#prev').css("pointer-events", "auto");

        }

    }

    stop();


    function stop_thumbs() {
        var thumb_width = $('#slider_2').width();
        var first_thumb_id = $('.slide2').first().attr('id');
        var last_thumb_id = $('.slide2').last().attr('id');
        var last_thumb = $('.slide2').last().width();
        var left_of_thumb = thumb_width - last_thumb;
        //alert(left_of_thumb);
        //var offset_thumb = last_thumb_id.offset();
        //var offset_left = offset_thumb.left;
        //alert(last_thumb_id);
        var offset = $('#slider_2').offset();
        //alert( "left: " + offset.left + ", top: " + offset.top );
        //alert(z);


        $(".active").each(function () {
            var active_id = $(this).attr('id');
            var arr = active_id.split('main_');
            var first_thumb = $('.slide2').first().attr('id');
            var last_thumb = $('.slide2').last().attr('id');
            var z = arr[1];

            if (z == first_thumb) {
                $('.control_prev_2').css("pointer-events", "none");
                //alert("1");
            }
            else {
                $('.control_prev_2').css("pointer-events", "auto");
            }

            if (z == last_thumb) {
                $('.control_next_2').css("pointer-events", "none");
                //alert("1");
            }
            else {
                $('.control_next_2').css("pointer-events", "auto");
            }

        });


    }

    stop_thumbs();




});    