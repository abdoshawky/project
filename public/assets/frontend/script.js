$(document).ready(function(){


    $('.scroll').click(function(){
        var element = $(this).data('scroll');
        $('html, body').animate({
            scrollTop: $(element).offset().top - 120
        },1000);
    });




    if($('html').attr('lang') == 'ar'){
        var rtl = true;
    }else{
        var rtl = false;
    }

    // var carousel = $(".app-slides").featureCarousel({
    //     // include options like this:
    //     // (use quotes only for string values, and no trailing comma after last option)
    //     // option: value,
    //     // option: value
    // });

    // $("#but_prev").click(function () {
    //     carousel.prev();
    // });
    // $("#but_pause").click(function () {
    //     carousel.pause();
    // });
    // $("#but_start").click(function () {
    //     carousel.start();
    // });
    // $("#but_next").click(function () {
    //     carousel.next();
    // });

	// $('.app-slides').slick({
	// 	rtl: rtl,
	// 	centerMode: true,
	// 	centerPadding: '80px',
	// 	slidesToShow: 5,
	// 	prevArrow: '<span class="arrow right slick-prev"><i class="fa fa-long-arrow-right fa-2x"></i></span>',
	// 	nextArrow: '<span class="arrow left slick-prev"><i class="fa fa-long-arrow-left fa-2x"></i></span>',
	// 	responsive: [
	// 		{
	// 			breakpoint: 768,
	// 			settings: {
	// 				arrows: false,
	// 				centerMode: true,
	// 				centerPadding: '40px',
	// 				slidesToShow: 3
	// 			}
	// 		},
	// 		{
	// 			breakpoint: 480,
	// 			settings: {
	// 				arrows: false,
	// 				centerMode: true,
	// 				centerPadding: '40px',
	// 				slidesToShow: 1
	// 			}
	// 		}
	// 	]
	// });


});