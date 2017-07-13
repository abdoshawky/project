//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
   if ($(".navbar-fixed-top").offset().top > 50) {
       $(".navbar-fixed-top").addClass("TM-nav-collapse");
   } else {
       $(".navbar-fixed-top").removeClass("TM-nav-collapse");
   }
});

$(document).ready(function(){
/* This code is executed after the DOM has been completely loaded */

$('nav a.page-scroll,footer a.up').click(function(e){

// If a link has been clicked, scroll the page to the link's hash target:

$.scrollTo( this.hash || 0, 1000);
e.preventDefault();
});

});