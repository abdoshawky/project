/* global src */



$(document).ready(function() {





    new WOW().init();



    $("#menu").accordion();



    $("#mobile,#ss").owlCarousel({

        autoplay: true,

        autoplayTimeout: 6000,

        margin: 20,

        autoplayHoverPause: true,

        nav: true,

        transitionStyle: true,

        dots: false,

        loop: true,

        // rtl: true,

        smartSpeed: 1000,

        navText: [

            "<i class='fa fa-angle-right'></i>",

            "<i class='fa fa-angle-left'></i>"

        ],

        responsive: {

            0: {

                items: 1

            },

            600: {

                items: 2

            },

            1000: {

                items: 4

            }

        }

    });



    // fore tap and owl slider

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

        $($(e.target).attr('href'))

                .find('.owl-carousel')

                .owlCarousel('invalidate', 'width')

                .owlCarousel('refresh');

    });



    $("#slider").owlCarousel({

        autoplay: true,

        autoplayTimeout: 6000,

        margin: 0,

        autoplayHoverPause: true,

        nav: true,

        transitionStyle: true,

        dots: true,

        loop: true,

        rtl: true,

        smartSpeed: 1000,

        navText: [

            "<i class='fa fa-angle-left'></i>",

            "<i class='fa fa-angle-right'></i>"

        ],

        responsive: {

            0: {

                items: 1

            },

            600: {

                items: 1

            },

            1000: {

                items: 1

            }

        }

    });

    $(".nav p").click(function() {

        $(this).addClass("active").siblings().removeClass("active");

    });



    $(".fliter .list-unstyled li").click(function() {

        $(this).addClass("dark").siblings().removeClass("dark");

    });

    

    $(".width .list-inline li").click(function() {

        $(this).addClass("blak").siblings().removeClass("blak");

    });

    

    $("#brand").owlCarousel({

        autoplay: true,

        autoplayTimeout: 6000,

        margin: 10,

        autoplayHoverPause: true,

        nav: true,

        transitionStyle: true,

        dots: false,

        rtl: true,

        smartSpeed: 1000,

        navText: [

            "<i class='fa fa-angle-left'></i>",

            "<i class='fa fa-angle-right'></i>"

        ],

        responsive: {

            0: {

                items: 1

            },

            600: {

                items: 3



            },

            1000: {

                items: 4

            }

        }

    });





    $('#gallery-2').royalSlider({

        fullscreen: {

            enabled: true,

            nativeFS: true

        },

        controlNavigation: 'thumbnails',

        thumbs: {

            orientation: 'vertical',

            paddingBottom: 4,

            appendSpan: true

        },

        autoPlay: {

            // autoplay options go gere

            enabled: true,

            pauseOnHover: true,

            delay: 5000

        },

        

        transitionType: 'fade',

        autoScaleSlider: true,

        autoScaleSliderWidth: 960,

        autoScaleSliderHeight: 600,

        loop: true,

        arrowsNav: false,

        keyboardNavEnabled: true



    });



  // $('ul.mtree').mtree({

  //       collapsed: true, // Start with collapsed menu (only level 1 items visible)

  //       close_same_level: true, // Close elements on same level when opening new node.

  //       duration: 500, // Animation duration should be tweaked according to easing.

  //       listAnim: true, // Animate separate list items on open/close element (velocity.js only).

  //       easing: 'easeOutQuart'// Velocity.js only, defaults to 'swing' with jquery animation.

  //   });





});