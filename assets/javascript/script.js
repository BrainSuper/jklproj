jQuery(function($) {

  // Add custom script here. Please backup the file before editing/modifying. Thanks

  // Run the script once the document is ready
  $(document).ready(function() {
    $(window).scroll(function() {
      var nav = $('header');
      var top = 20;
      if ($(window).scrollTop() >= top) {

        nav.addClass('bg-light');

      } else {
        nav.removeClass('bg-light');
      }
    });

    var $owl = $('.home .owl-carousel');

    $owl.children().each( function( index ) {
      $(this).attr( 'data-position', index );
    });

    $owl.owlCarousel({
      center: true,
      dots: true,
      items: 1,
      margin:205,
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
          nav:false
        },
        600:{
          items:1,
          nav:false
        },
        1000:{
          items:1,
          nav:false,
          loop:false
        }
      }


    });

    $(document).on('click', '.owl-item>div', function() {
      var $speed = 300;
      $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
    });


    $('.local-carousel').slick({
      slidesToShow: 3,
      customPaging: '33px',
      variableWidth: true,
      arrows: false,
    });

  $('.local-carousel').find(".slick-slide").on("click", function(){
     $('.local-carousel').slick("slickNext");
  });

    $(".amazingslider-bullet-12").on("click", function() {
    });

    $('.amazingslider-bullet-12').hover(function() {
      $(this).trigger('click');
    });
  });

  // Run the script once the window finishes loading
  $(window).load(function(){

  });


});
