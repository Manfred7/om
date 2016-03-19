/*-----------------------------------------------------------------------------------*/
/* Preloader & Initialize Masonry Script
/*-----------------------------------------------------------------------------------*/

// Set jQuery to NoConflict Mode
jQuery.noConflict();

/*-----------------------------------------------------------------------------------*/
/* Superfish Initialization
/*-----------------------------------------------------------------------------------*/
jQuery(function() {
      jQuery('ul.sf-menu').superfish({
          autoArrows:  true
      });
});

(function($) {
	$(window).load(function() {
		jQuery('.featured a.isobrick.isotope-item').addClass('importanttransition');
	});
})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* jQuery Mobile Nav Helper
/*-----------------------------------------------------------------------------------*/

/* Mobile Nav will work without jQuery, this just helps User Experience */

jQuery( document ).ready( function ( $ ) {

	$( ".scroll" ).click( function ( event ) {
		event.preventDefault();
		$this = $( this );

		var offset = $( $( this ).attr( 'href' ) ).offset().top;
		$( 'html, body' ).animate( { scrollTop: offset - 75 }, 500, 'easeOutCubic' );

		$links = $this.parent().find( 'div.mobilenavigation ul a' ).not( 'div.mobilenavigation ul li#back a, div.mobilenavigation ul li#back_top a' );
		$backlinks = $this.parent().find( 'div.mobilenavigation ul li#back, div.mobilenavigation ul li#back_top' );

		$links.addClass( 'display' );
		$backlinks.addClass( 'display' );
	} );


	$( ".menutop" ).click( function ( event ) {
		event.preventDefault();
		$this = $( this );

		$links = $this.closest( '.mobilenavcontainer' ).find( 'div.mobilenavigation ul a' ).not( 'div.mobilenavigation ul li#back a, div.mobilenavigation ul li#back_top a' );

		$backlink = $this.parent( '.display' ).removeClass( 'display' );
		$links.removeClass( 'display' );

	} );

} );


/*-----------------------------------------------------------------------------------*/
/* Pretty Photo
/*-----------------------------------------------------------------------------------*/
jQuery( function () {
	jQuery( "a[rel^='prettyPhoto']" ).prettyPhoto( {
		animation_speed: 'fast', /* fast/slow/normal */
		slideshow: 5000, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.80, /* Value between 0 and 1 */
		show_title: false, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 500,
		default_height: 344,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: tw.options.prettyPhotoSkin, /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		horizontal_padding: 20, /* The padding on each side of the picture */
		hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
		wmode: 'opaque', /* Set the flash wmode attribute */
		autoplay: true, /* Automatically start videos: True/False */
		modal: false, /* If set to true, only the close button will close the window */
		deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
		overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
		keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
		changepicturecallback: function () {}, /* Called everytime an item is shown/changed */
		callback: function () {}, /* Called when prettyPhoto is closed */
		ie6_fallback: true,
		social_tools: ''
	} );
} );


/*-----------------------------------------------------------------------------------*/
/* Hover Effects
/*-----------------------------------------------------------------------------------*/
function hover_overlay () {

	jQuery( '.featured h2, .featured a.one_col .featuredoverlay, .featured a.two_col .featuredoverlay, .featured .bubblewrap' ).each( function () {

		jQuery( this ).hover( function () {
			var $this = jQuery( this ).parent().children().next( '.featuredoverlay' );
			jQuery( $this ).stop().animate( { opacity: 0.1 }, 250, 'easeOutCubic' );
		}, function () {
			var $this = jQuery( this ).parent().children().next( '.featuredoverlay' );
			jQuery( $this ).stop().animate( { opacity: 1 }, 250, 'easeOutCubic' );

		} );
	} );
}
hover_overlay();

function hover_overlay_recent () {

	jQuery( '.relatedposts h2, .relatedposts a.one_col .featuredoverlay, .relatedposts .bubblewrap' ).each( function () {

		jQuery( this ).hover( function () {
			var $this = jQuery( this ).parent().children().next( '.featuredoverlay' );
			jQuery( $this ).stop().animate( { opacity: 0.1 }, 250, 'easeOutCubic' );
		}, function () {
			var $this = jQuery( this ).parent().children().next( '.featuredoverlay' );
			jQuery( $this ).stop().animate( { opacity: 1 }, 250, 'easeOutCubic' );

		} );
	} );
}
hover_overlay_recent();


function hover_overlay_article () {

	jQuery( 'a.thumblink, a.rating' ).each( function () {

		jQuery( this ).hover( function () {
			$selector = jQuery( this ).parent().children( 'a.thumblink' ).children( 'img' );
			$selector.stop().animate( { opacity: .1 }, 250, 'easeOutCubic' );
		}, function () {
			$selector.stop().animate( { opacity: 1 }, 250, 'easeOutCubic' );
		} );

	} );
}
hover_overlay_article();

function hover_overlay_slide () {

	jQuery( '.video' ).hover( function () {
		jQuery( this ).stop().animate( { opacity: 1 }, 100 );
	}, function () {
		jQuery( this ).stop().animate( { opacity: .9 }, 100 );
	} );
}
hover_overlay_slide();

function hover_overlay_images () {

	jQuery( 'a img' ).not( 'a.thumblink img' ).hover( function () {
		jQuery( this ).stop().animate( { opacity: 0.7 }, 500 );
	}, function () {
		jQuery( this ).stop().animate( { opacity: 1 }, 500 );
	} );
}
hover_overlay_images();


/*-----------------------------------------------------------------------------------*/
/*  Scroll to Top by Andre Gagnon
/*-----------------------------------------------------------------------------------*/

jQuery( document ).ready( function () {

	jQuery( window ).scroll( function () {

		var y_scroll_pos = window.pageYOffset;
		var scroll_pos_test = 50;             // set to whatever you want it to be

		if ( y_scroll_pos > scroll_pos_test ) {
			jQuery( '.top' ).fadeIn( 1000 );
			jQuery( '.iphone' ).children( '.top' ).css( 'display', 'none !important' );
		} else {
			jQuery( '.top' ).fadeOut( 500 );
		}

	} );

	jQuery( '.top' ).click( function () {
		jQuery( 'html, body' ).animate( { scrollTop: 0 }, 500, 'easeOutCubic' );
		return false;
	} );
} );


/*-----------------------------------------------------------------------------------*/
/*  jQuery Isotope
/*-----------------------------------------------------------------------------------*/

if(jQuery().isotope) {

var $selector = '*';

	(function($){

	  var $container = jQuery('div#isofeatured'),
	      $container2 = jQuery('div#isonormal'),
	      $colnum,
	      $colnum2;

		/************************************************
		* Featured and non-featured isotope events
		************************************************/

		function featuredIsotope() {

			setFeaturedWidth();

			$container.isotope( {
				masonry: {
					columnWidth: $container.width() / $colnum
				},
				itemSelector: '.isobrick',
				layoutMode: 'masonry'
			} );
		}

		function nonFeaturedIsotope() {

			setNonFeaturedWidth();

			$container2.isotope( {
				masonry: {
					columnWidth: $container2.width() / $colnum2
				},
				itemSelector: '.isobrick',
				layoutMode: 'masonry'
			} );
		}

		function setNonFeaturedWidth() {
			/* Set Column Number on Load
			 /* =============================================*/
			if ($container2.width() < 320 ) {
				$colnum2 = 1;
			} else {
				$colnum2 = 2;
			}
		}

		function setFeaturedWidth() {
			if ($container.width() < 500 ) {
				$colnum = 2;
			} else {
				$colnum = 3;
			}
		}

		nonFeaturedIsotope();
		featuredIsotope();

		// relayout on imagesloaded
		imagesLoaded(".isobrick img").on("progress", function (imagesLoadedInstance, image) {
			nonFeaturedIsotope();
			featuredIsotope();
		});

		$(window).resize(function () {
			nonFeaturedIsotope();
			featuredIsotope();
		});

		// filter items when filter link is clicked
		jQuery( '#filters a, a.filtersort' ).click( function () {

			var $filter = jQuery( '#filters a' );

			$filter.removeClass( "active" );
			$selector = jQuery( this ).attr( 'data-filter' );

			$filter.each( function () {
				$filterselect = jQuery( this ).attr( 'data-filter' );
				if ( $filterselect == $selector ) {
					jQuery( this ).addClass( "active" );
				}
			} );

			$container.isotope( { filter: $selector } );
			return false;
		} );
	})( jQuery );

} // if isotope


/*-----------------------------------------------------------------------------------*/
/* Show Homepage Tooltip
/*-----------------------------------------------------------------------------------*/

jQuery( function ( $ ) {
	$( window ).load( function () {

		var $scrollpos = $( '.home li#news_list' ).offset();
		var $done = false;

		if ( $scrollpos ) {
			jQuery( window ).scroll( function () {

				var y_scroll_pos = window.pageYOffset;
				var scroll_pos_test = $scrollpos.top - $( window ).height() + 125;             // set to whatever you want it to be

				if ( $done == false ) {

					if ( y_scroll_pos > scroll_pos_test ) {
						$( 'li#news_list div.tooltip' ).stop().animate( {
							opacity: 1,
							right: -112
						}, 1000, "easeOutCubic" )
							.delay( 3000 )
							.animate( { opacity: 0, right: -150 }, 1000, "easeOutCubic" );

						$done = true;
					}
				}

				if ( y_scroll_pos < scroll_pos_test ) {
					$done = false;
				}

			} );

		}

	} );

} );

/*-----------------------------------------------------------------------------------*/
/* Tooltips
/*-----------------------------------------------------------------------------------*/
jQuery(function($) {
    $('.tooltip-top').tipsy({
    delayIn: 500,      // delay before showing tooltip (ms)
    delayOut: 0,     // delay before hiding tooltip (ms)
    fade: true,     // fade tooltips in/out?
    fallback: '',    // fallback text to use when no tooltip text
    gravity: 's',    // gravity
    html: false,     // is tooltip content HTML?
    live: false,     // use live event support?
    offset: 5,       // pixel offset of tooltip from element
    opacity: 1,    // opacity of tooltip
    title: 'title',  // attribute/callback containing tooltip text
    trigger: 'hover' // how tooltip is triggered - hover | focus | manual
  });
});

jQuery(function($) {
    $('.tooltip-bottom').tipsy({
    delayIn: 500,      // delay before showing tooltip (ms)
    delayOut: 0,     // delay before hiding tooltip (ms)
    fade: true,     // fade tooltips in/out?
    fallback: '',    // fallback text to use when no tooltip text
    gravity: 'n',    // gravity
    html: false,     // is tooltip content HTML?
    live: false,     // use live event support?
    offset: 5,       // pixel offset of tooltip from element
    opacity: 1,    // opacity of tooltip
    title: 'title',  // attribute/callback containing tooltip text
    trigger: 'hover' // how tooltip is triggered - hover | focus | manual
  });
});
jQuery(function($) {
    $('.tooltip-left').tipsy({
    delayIn: 500,      // delay before showing tooltip (ms)
    delayOut: 0,     // delay before hiding tooltip (ms)
    fade: true,     // fade tooltips in/out?
    fallback: '',    // fallback text to use when no tooltip text
    gravity: 'e',    // gravity
    html: false,     // is tooltip content HTML?
    live: false,     // use live event support?
    offset: 5,       // pixel offset of tooltip from element
    opacity: 1,    // opacity of tooltip
    title: 'title',  // attribute/callback containing tooltip text
    trigger: 'hover' // how tooltip is triggered - hover | focus | manual
  });
});
jQuery(function($) {
    $('.tooltip-right').tipsy({
    delayIn: 500,      // delay before showing tooltip (ms)
    delayOut: 0,     // delay before hiding tooltip (ms)
    fade: true,     // fade tooltips in/out?
    fallback: '',    // fallback text to use when no tooltip text
    gravity: 'w',    // gravity
    html: false,     // is tooltip content HTML?
    live: false,     // use live event support?
    offset: 5,       // pixel offset of tooltip from element
    opacity: 1,    // opacity of tooltip
    title: 'title',  // attribute/callback containing tooltip text
    trigger: 'hover' // how tooltip is triggered - hover | focus | manual
  });
});

/*-----------------------------------------------------------------------------------*/
/* Flexible Sliders
/*-----------------------------------------------------------------------------------*/
(function($){  //Self Invoking Anonymous Function

  $(window).load(function() {

      // Single Page Non-Autoplay Slider

      $('div.slider').not('div.homepageslideshow div.slider').each(function() {
        var $this = jQuery(this);
            $this.nivoSlider({
                effect: tw.options.slideshowTrans, // Slideshow Transition
                slices: 15, // For slice animations
                boxCols: 8, // For box animations
                boxRows: 4, // For box animations
                animSpeed: 500, // Slide transition speed
                pauseTime: tw.options.autoplayDelay, // How long each slide will show
                startSlide: 0, // Set starting Slide (0 index)
                directionNav: true, // Next & Prev navigation
                directionNavHide: true, // Only show on hover
                controlNav: true, // 1,2,3... navigation
                controlNavThumbs: false, // Use thumbnails for Control Nav
                pauseOnHover: true, // Stop animation while hovering
                manualAdvance: true, // Force manual transitions
                prevText: 'Prev', // Prev directionNav text
                nextText: 'Next', // Next directionNav text
                randomStart: false, // Start on a random slide
                beforeChange: function(){}, // Triggers before a slide transition
                afterChange: function(){}, // Triggers after a slide transition
                slideshowEnd: function(){}, // Triggers after all slides have been shown
                lastSlide: function(){}, // Triggers when last slide is shown
                afterLoad: function(){} // Triggers when slider has loaded

            });
        });

    // Single Page Autoplay Slider

    $('div.sliderautoplay').each(function() {
        var $this = jQuery(this);
            $this.nivoSlider({
                effect: tw.options.slideshowTrans, // Slideshow Transition
                slices: 15, // For slice animations
                boxCols: 8, // For box animations
                boxRows: 4, // For box animations
                animSpeed: 500, // Slide transition speed
                pauseTime: tw.options.autoplayDelay, // How long each slide will show
                startSlide: 0, // Set starting Slide (0 index)
                directionNav: true, // Next & Prev navigation
                directionNavHide: true, // Only show on hover
                controlNav: true, // 1,2,3... navigation
                controlNavThumbs: false, // Use thumbnails for Control Nav
                pauseOnHover: true, // Stop animation while hovering
                manualAdvance: false, // Force manual transitions
                prevText: 'Prev', // Prev directionNav text
                nextText: 'Next', // Next directionNav text
                randomStart: false, // Start on a random slide
                beforeChange: function(){}, // Triggers before a slide transition
                afterChange: function(){}, // Triggers after a slide transition
                slideshowEnd: function(){}, // Triggers after all slides have been shown
                lastSlide: function(){}, // Triggers when last slide is shown
                afterLoad: function(){} // Triggers when slider has loaded

            });
        });

    });

// Slider for the homepage grid

jQuery('div.homeslider').each(function() {
        var $this = jQuery(this);
        $this.nivoSlider({
            effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
            slices: 15, // For slice animations
            boxCols: 8, // For box animations
            boxRows: 4, // For box animations
            animSpeed: 800, // Slide transition speed
            pauseTime: Math.floor(Math.random()*10001) + 3000,
            startSlide: 0, // Set starting Slide (0 index)
            directionNav: false, // Next & Prev navigation
            directionNavHide: true, // Only show on hover
            controlNav: false, // 1,2,3... navigation
            controlNavThumbs: false, // Use thumbnails for Control Nav
            pauseOnHover: true, // Stop animation while hovering
            manualAdvance: (tw.options.homeAutoPlay == 'true'), // How long each slide will show, // Force manual transitions
            prevText: 'Prev', // Prev directionNav text
            nextText: 'Next', // Next directionNav text
            randomStart: false, // Start on a random slide
            beforeChange: function(){}, // Triggers before a slide transition
            afterChange: function(){}, // Triggers after a slide transition
            slideshowEnd: function(){}, // Triggers after all slides have been shown
            lastSlide: function(){}, // Triggers when last slide is shown
            afterLoad: function(){} // Triggers when slider has loaded
        });
      });
jQuery('div.homepageslideshow div.slider').nivoSlider({
            effect: tw.options.homeSlideshowTrans, // Specify sets like: 'fold,fade,sliceDown'
            slices: 15, // For slice animations
            boxCols: 8, // For box animations
            boxRows: 4, // For box animations
            animSpeed: 800, // Slide transition speed
            pauseTime: Number( tw.options.homeAutoPlayDelay ), // How long each slide will show
            startSlide: 0, // Set starting Slide (0 index)
            directionNav: true, // Next & Prev navigation
            directionNavHide: true, // Only show on hover
            controlNav: true, // 1,2,3... navigation
            controlNavThumbs: false, // Use thumbnails for Control Nav
            pauseOnHover: true, // Stop animation while hovering
            manualAdvance: (tw.options.homeAutoPlay == 'true'), // How long each slide will show, // Force manual transitions
            prevText: 'Prev', // Prev directionNav text
            nextText: 'Next', // Next directionNav text
            randomStart: false, // Start on a random slide
            beforeChange: function(){}, // Triggers before a slide transition
            afterChange: function(){}, // Triggers after a slide transition
            slideshowEnd: function(){}, // Triggers after all slides have been shown
            lastSlide: function(){}, // Triggers when last slide is shown
            afterLoad: function(){} // Triggers when slider has loaded
        });

})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* FitVid Fluid Video
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
    jQuery(".sitecontainer").fitVids();
});

/*-----------------------------------------------------------------------------------*/
/* Form Validation
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
	jQuery("#contactform").validate();
	jQuery("#quickform").validate();
  jQuery("#commentsubmit").validate();
});

/*-----------------------------------------------------------------------------------*/
/* Tabs
/*-----------------------------------------------------------------------------------*/

if(jQuery() .tabs) {
  jQuery( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
  jQuery( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  jQuery( "#tabs" ).tabs({ fx: { opacity: 'toggle' } });
};

jQuery(document).ready(function($) {

  /* Tabs Activiation
  ================================================== */

  var tabs = $('ul.tabs');

  tabs.each(function(i) {

    //Get all tabs
    var tab = $(this).find('> li > a');
    tab.click(function(e) {

      //Get Location of tab's content
      var contentLocation = $(this).attr('href');

      //Let go if not a hashed one
      if(contentLocation.charAt(0)=="#") {

        e.preventDefault();
        //Make Tab Active
        tab.removeClass('active');
        $(this).addClass('active');

        //Show Tab Content & add active class
        $(contentLocation).fadeIn(500).addClass('active').siblings().hide().removeClass('active');

      }
    });
  });
});

/*-----------------------------------------------------------------------------------*/
/* Homepage Dropdown
/*-----------------------------------------------------------------------------------*/

var news_list_open = false;

(function($){  //Self Invoking Anonymous Function

   $(window).load(function(){

        	$("#news_select").on('click', function () { // In case the select menu is clicked instead of hovered

        		if (news_list_open == true) {
                    $(".sf-menu #news_list ul").fadeOut();
                    news_list_open = false;
        		} else {
                    $(".sf-menu #news_list ul").fadeIn();
                    news_list_open = true;
        		}

        		return false; // prevent default action

        	});

   })

})(jQuery);


/*-----------------------------------------------------------------------------------*/
/* Ajax Load Posts from Category
/*-----------------------------------------------------------------------------------*/

function loadPostsFromCat($category) {

    var $container = jQuery('div#isonormal' );

	jQuery.ajax({
		type: 'POST',
		url: tw.ajaxurl,
		data: {
			'action': 'ag_get_posts',
			'cat': $category,
			'review': tw.options.reviewStyle,
			'cache' : false,
			'nonce' : tw.nonce
		},
		success: function(data, textStatus, XMLHttpRequest) {

			var $newItems = '';

			for ( var entry in data ) {
				var title = data[entry].title;
				var link = data[entry].link;


				var content = data[entry].content;
				var date = data[entry].date;
				var cats = data[entry].cats;
				var author = data[entry].author;

				// Get Review Information
				if ( data[entry].review ) {
					var review = data[entry].review;
				} else {
					var review = ' ';
				}

				if ( tw.options.sidebarWidth == 'extended' ) {
					var image = data[entry].imgcol;
				} else {
					var image = data[entry].img;
				}

				if ( image && data[entry].review ) { //if both review and image.
					var imgreview = "<div class='thumbnailarea'><a class='thumblink' href='" + data[entry].link + "' title='" + data[entry].title + "'><img src='" + image + "' class='scale-with-grid'/></a>" + data[entry].review + "</div>";
				} else if ( image ) { //if image
					var imgreview = "<div class='thumbnailarea'><a class='thumblink' href='" + data[entry].link + "' title='" + data[entry].title + "'><img src='" + image + "' class='scale-with-grid'/></a></div>";
				} else if ( data[entry].review ) { // if review
					var imgreview = data[entry].review;
				} else { //if neither
					var imgreview = '';
				}

				// Get Comment Information
				if ( data[entry].comments ) {
					var comments = "<a class='bubble' href='" + data[entry].link + "'>" + data[entry].comments + "</a>";
				} else {
					var comments = '';
				}

				$newItems += "<div class='one_col isobrick'><div class='articleinner'><div class='categories'>" + cats + "</div><h2><a href='" + link + "' title='" + title + "'>" + title + "</a></h2> <span class='date'>" + date + " | " + author + " " + comments + "</span>" + imgreview + " " + content + "<div class='clear'></div></div></div>";
			}


			$container.isotope( 'insert', jQuery( $newItems ) );

			// relayout on imagesloaded
			imagesLoaded(".isobrick img").on("progress", function (imagesLoadedInstance, image) {
				$container.isotope();
			});

			jQuery( 'div.paginationbutton, div#isonormal' ).animate( { "opacity": "1" }, 500 );
			jQuery( "span.smallloading" ).fadeOut( 500 );
			hover_overlay_article();
		},
		error: function(MLHttpRequest, textStatus, errorThrown) {
			console.log(errorThrown);
			console.log(MLHttpRequest);
		}
	});

  }

/* Load Posts in Single Column */

  function onecolloadPostsFromCat($category) {

    var $container = jQuery('div#fullcolumn');

	  jQuery.ajax( {
		  type: 'POST',
		  url: tw.ajaxurl,
		  data: {
			  'action': 'ag_get_posts',
			  'cat': $category,
			  'review': tw.options.reviewStyle,
			  'cache': false,
			  'nonce': tw.nonce
		  },
		  beforeSend: function () { },
		  success: function ( data, textStatus, XMLHttpRequest ) {

			  var $newItems = '';
			  var $fullWidth = '';

			  for ( var entry in data ) {
				  var title = data[entry].title;
				  var link = data[entry].link;


				  var content = data[entry].content;
				  var date = data[entry].date;
				  var cats = data[entry].cats;
				  var author = data[entry].author;

				  // Get Review Information
				  if ( data[entry].review ) {
					  var review = data[entry].review;
				  } else {
					  var review = ' ';
				  }

				  if ( data[entry].imgcol && data[entry].review ) { //if both review and image.
					  var imgreview = "<div class='thumbnailarea alignleft'><a class='thumblink' href='" + data[entry].link + "' title='" + data[entry].title + "'><img src='" + data[entry].imgcol + "' class='scale-with-grid'/></a>" + data[entry].review + "</div>";
					  $fullWidth = "";
				  } else if ( data[entry].imgcol ) { //if image
					  var imgreview = "<div class='thumbnailarea alignleft'><a class='thumblink' href='" + data[entry].link + "' title='" + data[entry].title + "'><img src='" + data[entry].imgcol + "' class='scale-with-grid'/></a></div>";
					  $fullWidth = "";
				  } else if ( data[entry].review ) { // if review
					  var imgreview = data[entry].review;
					  $fullWidth = "full";
				  } else { //if neither
					  var imgreview = '';
					  $fullWidth = "full";
				  }

				  // Get Comment Information
				  if ( data[entry].comments ) {
					  if ( data[entry].comments == 1 ) {
						  $commentcounter = tw.translations.comment;
					  } else {
						  $commentcounter = tw.translations.comments;
					  }
					  var comments = " | <a href='" + data[entry].link + "'>" + data[entry].comments + " " + $commentcounter + "</a>";
				  } else {
					  var comments = '';
				  }

				  $newItems += "<div class='fullarticle'><div class='articleinner'>" + imgreview + "<div class='fullcontent " + $fullWidth + "'><h2><a href='" + link + "' title='" + title + "'>" + title + "</a></h2> <span class='date'>" + date + " | By " + author + " " + comments + "</span>" + content + "<div class='clear'></div></div><div class='clear'></div></div></div><div class='clear'></div>";
			  }

			  $container.html( $newItems );
			  jQuery( 'div.paginationbutton, div#fullcolumn' ).animate( { "opacity": "1" }, 500 );
			  jQuery( "span.smallloading" ).fadeOut( 500 );
			  hover_overlay_article();
		  },
		  error: function ( MLHttpRequest, textStatus, errorThrown ) {
			  console.log( errorThrown );
			  console.log( MLHttpRequest );
		  },
		  complete: function ( XMLHttpRequest, textStatus ) {

		  },
		  dataType: 'json'
	  } );
  }


jQuery( ".sf-menu #news_list ul li a" ).click( function ( e ) {

	var $this = jQuery( this );
	var $cat_id = $this.attr( "data-value" );
	var $container = jQuery( 'div#isonormal' );
	var $onecol = jQuery( 'div#fullcolumn' );
	var $children = $container.children();
	var $onecolchildren = jQuery( 'div#fullcolumn' ).children();

	jQuery( "span.smallloading" ).fadeIn( 500 );
	jQuery( 'div.paginationbutton' ).animate( { "opacity": "0" }, 500 );

	/* Load Posts for Isotope Two Columns */
	$container.animate( { "opacity": "0" }, 500, function () {
		$container.isotope( 'remove', $children );
		loadPostsFromCat( $cat_id ); // function defined above
	} );

	/* Load Posts for One Column*/
	$onecol.animate( { "opacity": "0" }, 500, function () {
		$onecolchildren.remove();
		onecolloadPostsFromCat( $cat_id ); // function defined above
	} );

	/* Change Text of Dropdown to Match Category */
	jQuery( ".sf-menu #news_list a#news_select" )
		.text( $this.text() )
		.append( '<span class="sf-sub-indicator"> &raquo;</span>' );


	jQuery( ".sf-menu #news_list ul" ).fadeOut();

	news_list_open = false;

	e.preventDefault();
	return true;

  });