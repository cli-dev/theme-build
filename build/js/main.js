
try{Typekit.load({ async: true });}catch(e){}

jQuery(function($) {


    $('.cdm-item.facebook').each(function(index, el) {
      FB.api(
        $(this).data('facebook-id'),'GET',{fields:"full_picture", limit: $(this).data('facebook-posts')}, 
        function (result) {
          if (result && !result.error) {
            console.log('Successfully retrieved profile');
            $(this).empty();
          }


        }
      );
    });


    function onScrollInit( items, trigger) {
      var $items = $('.' + items);
      var $trigger = $('.' + trigger);
      $items.each( function() {
        var $item = $(this),
        itemClass = $item.data('sticky-color');

        var triggerClass = $trigger.data('sticky');

        var triggerHeight = $trigger.outerHeight();

        new Waypoint({
          element: this,
          handler: function(direction) {
            if (triggerClass !== itemClass) {
              $trigger.attr('data-sticky', itemClass);
            }
            var logo = $('.active-logo');
            if (!$('.' + itemClass + '-logo').hasClass('active-logo')) {
              $('.desktop-logo').removeClass('active-logo');
              $('.' + itemClass + '-logo').addClass('active-logo');
            }
          },
          offset: function() {
            return -this.element.clientHeight
          },
        });
      });
    }

    var map = null;

    function new_map( $el ) {
      var $markers = $el.find('.map-marker'); 
      var args = {
        zoom    : 16,
        center    : new google.maps.LatLng(0, 0),
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        draggable: false,
        mapTypeId : google.maps.MapTypeId.ROADMAP,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
      };
      var map = new google.maps.Map( $el[0], args);
      map.markers = [];
      $markers.each(function(){   
        add_marker( $(this), map );   
      });
      center_map( map );
      return map;
    }
    function add_marker( $marker, map ) {
      var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
      var mapPin = $marker.attr('data-icon');
      var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: mapPin,
      });
      map.markers.push( marker );
      if( $marker.html() )
      {
        var infowindow = new google.maps.InfoWindow({
          content   : $marker.html()
        });
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open( map, marker );
        });
      }
    }
    function center_map( map ) {
      var bounds = new google.maps.LatLngBounds();
      $.each( map.markers, function( i, marker ){
        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
        bounds.extend( latlng );
      });
      if( map.markers.length == 1 )
      {
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
      }
      else
      {
        map.fitBounds( bounds );
      }
    }


    $(document).ready(function() {


      $('.sub-menu').hide();
      $('.menu-container li.menu-item-has-children').append('<span class="sub-menu-icon"></span>');


      var siteHeader = $('.site-header').outerHeight();
      $('.top-padding-overlap').css('padding-top', siteHeader);
      $('.top-margin-overlap').css('margin-top', siteHeader);
      $('.menu-button-area').css('min-height', $('.site-header-logo').outerHeight());
      onScrollInit( 'has-sticky-class', 'sticky-header');
        var didScroll;
        var lastScrollTop = 0;
        var navbar = document.querySelector(".sticky-header");
        var navbarHeight = 0;
        var delta = 10;
        if (document.body.contains(navbar)) {
          var navbarHeight = navbar.offsetHeight;
          var delta = navbarHeight / 2;
        }
        var widgets = document.querySelector(".header-widgets");
        var widgetsHeight = 0;
        if (document.body.contains(widgets)) {
          var widgetsHeight = widgets.offsetHeight;
        }
        var top = widgetsHeight;

        window.addEventListener("scroll", function(){
          didScroll = true;
        });

        setInterval(function() {
          if (didScroll) {
            hasScrolled();
            didScroll = false;
          }
        }, 250);

        function hasScrolled() {
          if (document.body.contains(navbar)) {
            var posY = window.scrollY;

            if(Math.abs(lastScrollTop - posY) <= delta)
              return;

                        if (posY > lastScrollTop){
              navbar.classList.add("hidden");
            }
            if (posY > lastScrollTop && posY > navbarHeight){
              navbar.classList.add("stuck");
              navbar.classList.remove("visible-header");
            } 
            if(posY < lastScrollTop && posY > navbarHeight) {                
              navbar.classList.remove("hidden");
              navbar.classList.add("visible-header");
            }
            if(posY <= widgetsHeight) {
              navbar.classList.remove("visible-header");
              navbar.classList.remove("stuck");
              navbar.classList.remove("hidden");
            }

                        lastScrollTop = posY;
          }
        }





      $('.cdm-masonry').each( function() {
        var $grid = $(this);
      });       

      $('.hover-box.effect-lily').each(function(index, el) {
        var boxTitle = $(this).find('.box-title').height();
        var boxTxt = $(this).find('.box-txt').height();

        $(this).find('.box-content').css('min-height', boxTxt + boxTitle);

        $(this).find('.box-txt').css({
          '-webkit-transform' : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          '-moz-transform'    : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          '-ms-transform'     : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          '-o-transform'      : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          'transform'         : 'translate3d(0px, ' + boxTxt + 'px, 0px)'
        });
        $(this).find('.box-title').css({
          '-webkit-transform' : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          '-moz-transform'    : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          '-ms-transform'     : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          '-o-transform'      : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
          'transform'         : 'translate3d(0px, ' + boxTxt + 'px, 0px)'
        });
      });

      $('.cdm-item.map').each(function(){
        map = new_map( $(this) );
      });  

    });


    $(window).load(function() {
      if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))) {
        $('.bg-video-inner').each( function() {
          var videoMP4 = '';
          var videoOGV = '';
          var videoWEBM = '';

          if ($(this).data("video-mp4") != null) {
            var videoMP4 = '<source src="' + $(this).data("video-mp4") + '" type="video/mp4">';
          }
          if ($(this).data("video-ogv") != null) {
            var videoOGV = '<source src="' + $(this).data("video-ogv") + '" type="video/ogv">';
          }
          if ($(this).data("video-webm") != null) {
            var videoWEBM = '<source src="' + $(this).data("video-webm") + '" type="video/webm">';
          }

          $(this).prepend('<video autoplay loop>' + videoWEBM + videoMP4 + videoOGV + '</video>');
        });
      }
      $('.cdm-item.video').each( function() {
        var videoMP4 = '';
        var videoOGV = '';
        var videoWEBM = '';

        if ($(this).data("video-mp4") != null) {
          var videoMP4 = '<source src="' + $(this).data("video-mp4") + '" type="video/mp4">';
        }
        if ($(this).data("video-ogv") != null) {
          var videoOGV = '<source src="' + $(this).data("video-ogv") + '" type="video/ogv">';
        }
        if ($(this).data("video-webm") != null) {
          var videoWEBM = '<source src="' + $(this).data("video-webm") + '" type="video/webm">';
        }

        if ($(this).data("video-mp4") != null || $(this).data("video-ogv") != null || $(this).data("video-webm") != null) {
          $(this).prepend('<video controls>' + videoWEBM + videoMP4 + videoOGV + '</video>');
        }

           });
      var wow = new WOW({
        mobile: false, 
      });
      wow.init();
      if ($('#content').hasClass('error-page') || $('#content').hasClass('search-page')) {
        $('#page-not-found-title').bigtext({
            minfontsize: 24 
          });
        BackgroundCheck.init({
          targets: '.title-404',
          images: '.page-header'
        });
      }
      $('select').select2();

      $("input:checkbox, input:radio").uniform();
    });


    $(window).resize(function(event) {
      var siteHeader = $('.site-header').outerHeight();
      $('.top-padding-overlap').css('padding-top', siteHeader);
      $('.top-margin-overlap').css('margin-top', siteHeader);
      $('.hover-box.effect-lily').each(function(index, el) {
        var boxTitle = $(this).find('.box-title').height();
        var boxTxt = $(this).find('.box-txt').height();

        $(this).find('.box-content').css('min-height', boxTxt + boxTitle);

        $(this).find('.box-txt').css({
          '-webkit-transform' : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-moz-transform'    : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-ms-transform'     : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-o-transform'      : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          'transform'         : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)'
        });
        $(this).find('.box-title').css({
          '-webkit-transform' : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-moz-transform'    : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-ms-transform'     : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-o-transform'      : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          'transform'         : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)'
        });
      });
      $('.menu-button-area').css('min-height', $('.site-header-logo').outerHeight());
    });


    $('.cdm-slider').each( function() {
      var $carousel = $(this);
      var sliderPrefix = 'cdm-slider-';
      var sliderSettings = {
        items : $carousel.data("slider-items"),
        slideBy : $carousel.data("slider-slideby"),
        center : $carousel.data("slider-center"),
        loop : $carousel.data("slider-loop"),
        margin : $carousel.data("slider-gutter"),
        nav : $carousel.data("slider-nav"),
        dots : $carousel.data("slider-dots"),
        autoHeight: $carousel.data("slider-autoheight"),
        autoplay : $carousel.data("slider-autoplay"),
        autoplayTimeout : $carousel.data("slider-autoplay-timeout"),
        autoplaySpeed: 500,
        refreshClass: sliderPrefix + 'refresh',
        loadingClass: sliderPrefix + 'loading',
        loadedClass: sliderPrefix + 'loaded', 
        rtlClass: sliderPrefix + 'rtl',
        dragClass: sliderPrefix + 'drag',
        grabClass: sliderPrefix + 'grab', 
        stageClass: sliderPrefix + 'stage',
        stageOuterClass: sliderPrefix + 'outer-stage',
        controlsClass: sliderPrefix + 'controls', 
        navContainerClass: sliderPrefix + 'nav',
        navClass: [
        sliderPrefix + 'nav-prev ' + sliderPrefix + 'nav-btn',
        sliderPrefix + 'nav-next ' + sliderPrefix + 'nav-btn',
        ],
        navText: [
        '<span class="' + sliderPrefix + 'nav-icon"></span>', 
        '<span class="' + sliderPrefix + 'nav-icon"></span>',
        ],
        dotsClass: sliderPrefix + 'dots',  
        dotClass: sliderPrefix + 'dot', 
        autoHeightClass: sliderPrefix + 'height',
        thumbs: $carousel.data("slider-thumbs"),
        thumbImage: false,
        thumbsPrerendered: true,
        thumbContainerClass: sliderPrefix + 'thumbs',
        thumbItemClass: sliderPrefix + 'thumb',
        responsive : {
          0 : {
            items : $carousel.data("slider-items-sml"),
            margin : $carousel.data("slider-gutter-sml"),
          },
          480 : {
            items : $carousel.data("slider-items-mds"),
            margin : $carousel.data("slider-gutter-mds"),
          },
          768 : {
            items: $carousel.data("slider-items-md"),
            margin : $carousel.data("slider-gutter-md"),
          },
          1024 : {
            items : $carousel.data("slider-items-mdl"),
            margin : $carousel.data("slider-gutter-mdl"),
          },
          1280 : {
            items : $carousel.data("slider-items-lrg"),
            margin : $carousel.data("slider-gutter-lrg"),
          } 
        },
      };

      $('#wrapper').imagesLoaded( function() {
        $carousel.owlCarousel(sliderSettings);
      });

      $carousel.on('resized.owl.carousel', function(event) {
        var dots = $(this).children('.cdm-slider-dots').outerHeight();
        $(this).css('margin-bottom', dots);
      });

    });


      $("[data-fancybox]").fancybox({
      caption : function( instance, item ) {
        var caption, title;
        if ( item.type === 'image' ) {
          caption = $(this).data('caption');
          title = $(this).attr('title');
          return (title ? '<h4 class="gallery-img-title full-screen">' + title + '</h4>' : '') + (caption ? '<p class="gallery-img-caption full-screen">' + caption + '</p>' : '');
        }
      }
    });

    $.fancybox.defaults.hash = false;


    $('.menu-container li.menu-item-has-children').click(function(){
      if($(this).children('.sub-menu').css('display') === 'none'){
        $('.sub-menu').slideUp(200);
        $('.sub-menu-icon').removeClass('active-sub-icon');
        $(this).children('.sub-menu-icon').addClass('active-sub-icon');
        $(this).children('.sub-menu').slideDown(200);
      } else{
        $(this).children('.sub-menu').slideUp(200);
        $(this).children('.sub-menu-icon').removeClass('active-sub-icon');
      }
    });
    $('.menu-button-area').each(function(index, el) {
      $(this).click(function(){
        $('#wrapper').toggleClass('active-menu');
        $('.side-menu').toggleClass('active');
        $(this).siblings('.mobile-menu').slideToggle();
        $(this).children().toggleClass('active');
      });
    });   


    $.fn.extend({
      sameHeight: function () {
        var elementHeights = $(this).map(function() {
          return $(this).outerHeight();
        }).get();
        var minHeight = Math.max.apply(null, elementHeights);
        $(this).css('min-height', minHeight);
      }
    });


    $('#wrapper').imagesLoaded( function() {
      $('.cdm-masonry').isotope({
        itemSelector: '.masonry-item',
        percentPosition: true,
      });
    });


    $('.cdm-item.accordion').each(function(index, el) {
      var $accordionTab = $(this).find('.accordion-section-header');
      var openIcon = $(this).data('open-icon');
      var closeIcon = $(this).data('close-icon');

      $accordionTab.click(function() {
        $(this).siblings('.accordion-section-content').slideToggle();
        $(this).find('i').toggleClass(openIcon).toggleClass(closeIcon);
        $(this).parent().toggleClass('active-tab');
      });
    });



  });

