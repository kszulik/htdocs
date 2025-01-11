(function($) {
  
  setTimeout(function () {
    $('#preloader').fadeOut(500, function () { $(this).remove(); $(this).parents(".elementor-column-wrap").hide() });
  }, 500)

  $('.block.produtSingle').matchHeight();
  $('.produtSingle').matchHeight();
  $('.footer-widget .gallery').addClass('clearfix');
  $('.main-slider .slide-inner3').parent().parent().addClass('bg-img3');

  if (window.location.href.indexOf("shop") > -1) {
    $('body').addClass('shop');
  }
})(jQuery);


jQuery(document).ready(function(){
  'use strict';
 
  //============================== MENU SCROLL =========================
   jQuery(window).load(function(){
    jQuery('.body-wrapper').each(function(){
      var header_area = jQuery('.header');
      var main_area = header_area.children('.navbar-default');

      var logo = main_area.find('.navbar-header');
      var navigation = main_area.find('.navbar-collapse');
      var original = {
        nav_top: navigation.css('margin-top')
      };

      jQuery(window).scroll(function(){
        if( main_area.hasClass('bb-fixed-header') && (jQuery(this).scrollTop() === 0 || jQuery(this).width() < 750)){
          main_area.removeClass('bb-fixed-header').appendTo(header_area);
          navigation.animate({'margin-top': original.nav_top}, {duration: 300, queue: false, complete: function(){
            header_area.css('height', 'auto');
          }});
        }else if( !main_area.hasClass('bb-fixed-header') && jQuery(this).width() > 750 &&
          jQuery(this).scrollTop() > header_area.offset().top + header_area.height() - parseInt(jQuery('html').css('margin-top'), 10) ){

          header_area.css('height', header_area.height());
          main_area.css({'opacity': '0'}).addClass('bb-fixed-header');
          main_area.appendTo(jQuery('body')).animate({'opacity': 1});

          navigation.css({'margin-top': '0px'});
        }
      });
    });

    jQuery(window).trigger('resize');
    jQuery(window).trigger('scroll');
  });



  //============================== MAIN SLIDER =========================
  var jQueryheroSlider = jQuery( '.main-slider .inner' );
  if ( jQueryheroSlider.length > 0 ) {
    jQueryheroSlider.each( function () {

    var loop = jQuery(this).parent().data('loop'),
        autoplay = jQuery(this).parent().data('autoplay'),
        interval = jQuery(this).parent().data('interval') || 3000;

      jQuery(this).owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        navText: [  ],
        autoplay: false,
        autoplayTimeout: interval,
        autoplayHoverPause: true,
        smartSpeed:700
      });
    });
  }
  jQuery( '.rtl .main-slider .inner' ).owlCarousel({
    rtl: true
  });
  //============================== MAIN SLIDER RESIZE =========================
  function resizeContentMobile() {
    var height = jQuery(window).height() - 119;
    jQuery('.slideResize').height(height);
  }
  resizeContentMobile();

  function resizeContent() {
    var height = jQuery(window).height() - 159;
    jQuery('.slideResize').height(height);
  }
  resizeContent();

  if (jQuery(window).width() < 768) {
    resizeContentMobile();
  }
  else {
    resizeContent();
  }

  jQuery(window).resize(function() {
    resizeContent();
    resizeContentMobile();
  });

   //============================== BACK TO TOP SMOOTH SCROLL=========================
  jQuery('a[href="#pageTop"]').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    jQuery('html, body').animate({ scrollTop: 0 }, 1500);
      return false;
  });

  //============================== SMOOTH SCROLLING TO SECTION =========================
  jQuery('.scrolling  a[href*="#"]').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var target = jQuery(this).attr('href');
    jQuery(target).velocity('scroll', {
      duration: 800,
      offset: -150,
      easing: 'easeOutExpo',
      mobileHA: false
    });
  });

});


jQuery(document).ready(function(){
  jQuery(".flex-control-nav").owlCarousel({
        items: 4,
        margin:10,
        nav:false,
        autoplay:true,
        loop: false,
        dots: false,
      });
});


 //============================== Tilt Effect in Gallery & Image  =========================
jQuery(document).ready(function($){
  jQuery('.tilt-image img').tilt({
    maxTilt:        20,
    perspective:    1000, 
  });

});

jQuery(document).ready(function($){
  jQuery('.tilt-image-gallery img').tilt({
    maxTilt:        20,
    perspective:    700,   // Transform perspective, the lower the more extreme the tilt gets.
    easing:         "cubic-bezier(.03,.98,.52,.99)",    // Easing on enter/exit.
    scale:          1,      // 2 = 200%, 1.5 = 150%, etc..
    speed:          500,    // Speed of the enter/exit transition.
    transition:     true,   // Set a transition on enter/exit.
    disableAxis:    null,   // What axis should be disabled. Can be X or Y.
    reset:          true,   // If the tilt effect has to be reset on exit.
    glare:          false,  // Enables glare effect
    maxGlare:       1       // From 0 - 1.
  });

});





jQuery(window).on('elementor/frontend/init', function () {

elementorFrontend.hooks.addAction('frontend/element_ready/team_section.default', function(){
  jQuery(".team-slider").owlCarousel({
        items: 4,
        autoplay:false,
        loop: true,
        dots: true,
        responsive:{
                0:{
                    nav:false,
                    items:1
                },
                400:{
                    nav:false,
                    items:1
                },
                600:{
                    nav:false,
                    items:2
                },
                650:{
                    nav:false,
                    items:2
                },
                700:{
                    nav:false,
                    items:2
                },
                770:{
                    nav:false,
                    items:3
                },
                800:{
                    nav:false,
                    items:3
                },

                1000:{
                    items:4
                }
            }
      });

});

elementorFrontend.hooks.addAction('frontend/element_ready/team_section.default', function(){
jQuery('.angel-tab li a:first').tab('show') 

});




elementorFrontend.hooks.addAction('frontend/element_ready/slider.default', function(){

  var jQueryheroSlider = jQuery( '.main-slider .inner' );
  if ( jQueryheroSlider.length > 0 ) {
    jQueryheroSlider.each( function () {

    var loop = jQuery(this).parent().data('loop'),
        autoplay = jQuery(this).parent().data('autoplay'),
        interval = jQuery(this).parent().data('interval') || 3000;

      jQuery(this).owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        navText: [  ],
        autoplay: false,
        autoplayTimeout: interval,
        autoplayHoverPause: true,
        smartSpeed:700
        });
      });
    }
    jQuery( '.rtl .main-slider .inner' ).owlCarousel({
      rtl: true
    });
    //============================== MAIN SLIDER RESIZE =========================
    function resizeContentMobile() {
      var height = jQuery(window).height() - 119;
      jQuery('.slideResize').height(height);
    }
    resizeContentMobile();

    function resizeContent() {
      var height = jQuery(window).height() - 159;
      jQuery('.slideResize').height(height);
    }
    resizeContent();

    if (jQuery(window).width() < 768) {
      resizeContentMobile();
    }
    else {
      resizeContent();
    }

    jQuery(window).resize(function() {
      resizeContent();
      resizeContentMobile();
    });




  });

/*=============================================================
				button with mouse pointer
=========================================================================*/
if ( jQuery( '.btn-primary' ).length > 0 ) {
	jQuery('.btn-primary' ).on( 'mouseenter', function ( e ) {

		var parentOffset = jQuery( this ).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;

		if ( jQuery( this ).find( 'span' ) ) {
			jQuery( '.btn-primary span' ).css( {
				top: relY,
				left: relX,
			} );
		}
	} );
	jQuery( '.btn-primary' ).on( 'mouseout', function ( e ) {

		var parentOffset = jQuery( this ).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;

		if ( jQuery( this ).find( 'span' ) ) {
			jQuery( '.btn-primary span' ).css( {
				top: relY,
				left: relX,
			} );
		}
	} );
}

});



/*=============================================================
				Image image-compare
=========================================================================*/

( function( $, elementor ) {

	'use strict';

	var widgetImageCompare = function( $scope, $ ) {
        var $image_compare_main = $scope.find('.angel-image-compare');
        var $image_compare      = $scope.find('.image-compare');
        if ( !$image_compare.length ) {
            return;
        }

        var $settings        = $image_compare.data('settings');
        // var 
        // default_offset_pct   = $settings.default_offset_pct;

        var viewers = document.querySelectorAll('#' + $settings.id);
        
        var options = {
          // startingPoint  : default_offset_pct,
          };

          viewers.forEach(function (element){
            var view = new ImageCompare(element, options).mount();
          });

  };
  
  // filterable gallery script starts

var angelFilterableGallery = function( $scope, $ ) {
  $( window ).load( function() {

      if ( $.isFunction( $.fn.isotope ) ) {
          var angelGetTable       = $scope.find( '.angel-gallery-element' ).eq( 0 ),
          currentTableId         = '#' + angelGetTable.attr( 'id' ),
          $container             = $scope.find( currentTableId ).eq( 0 );
          
          var galleryMainWrapper = $scope.find( '.angel-gallery-items' ).eq( 0 ),
          galleryItem            = '#' + galleryMainWrapper.attr( 'id' );

          $container.isotope({
              filter: '*',
              animationOptions: {
                  queue: true
              }
          });

          $( galleryItem + ' .angel-gallery-menu button' ).click( function() {
              $( galleryItem + ' .angel-gallery-menu button.current' ).removeClass( 'current' );
              $( this ).addClass( 'current' );
       
              var selector = $( this ).attr( 'data-filter' );
              $container.isotope( {
                  filter: selector,
                  layoutMode: 'fitRows',
                  getSortData: {
                      name: '.name',
                      symbol: '.symbol',
                      number: '.number parseInt',
                      category: '[data-category]',
                      weight: function( itemElem ) {
                          var weight = $( itemElem ).find( '.weight' ).text();
                          return parseFloat( weight.replace( /[\(\)]/g, '' ) );
                      }
                  },
                  animationOptions: {
                      queue: true
                  }
               } );
               return false;
          } ); 
      }
  } ); 
}

// filterable gallery script ends

	jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/image-compare.default', widgetImageCompare );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/angel-filterable-gallery.default', angelFilterableGallery );
	});

}( jQuery, window.elementorFrontend ) );




