(function ($) {
	var html    = $( 'html' ),
		body    = $( 'body' ),
	    _window = $( window );

	
	// WP: Enables menu toggle for small screens
	( function() {
		
		// Decalaring variables
		var mainNav = $( '#main-navigation' ), mainNavControl, overlay, navMenu, mainNavActive, mainNavInactive;
		if ( ! mainNav )
			return;

		mainNavControl = mainNav.find( '#main-navigation-control' );
		if ( ! mainNavControl )
			return;

		// Hide button if menu is missing or empty.
		navMenu = mainNav.find( 'div.nav-menu > ul' );
		if ( ! navMenu || ! navMenu.children().length ) {
			mainNavControl.hide();
			return;
		}

		overlay = html;
		if ( ! overlay )
			return;
		
		mainNavActive = 'status-main-nav-active';
		mainNavInactive = 'status-main-nav-inactive';
        overlayActive = 'status-overlay-active';

		function navToggle() {
			$( html ).toggleClass( mainNavActive ).toggleClass( mainNavInactive ).toggleClass( overlayActive );
		};
		
        // Activates the nav
		$( mainNavControl ).on( 'click.hopscotch', function(e) {
			navToggle();
			e.stopPropagation();
		} );
		
        // Prevents the actual nav to deactivate the nav
		$( navMenu ).on( 'click.hopscotch', function(e) {
			e.stopPropagation();
		});
		
        // Overlay deactivates the nav
		$( overlay ).on( 'click.hopscotch', function(e) {
			if ( html.hasClass( mainNavActive )) {
				navToggle();
			}
		});
		
		$(document).on( 'keydown.hopscotch', function(e) {
			if (e.which === 27 && html.hasClass( mainNavActive )  ) {
				navToggle();
			}
		});
		
	} )();

	
	// WP: Twenty Fourteen - Makes "skip to content" link work correctly in IE9 and Chrome for better accessibility
	_window.on( 'hashchange', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
				element.tabIndex = -1;

			element.focus();
		}
	} );
	
	
	// Detect bottom of page
	$( function () {
		_window.scroll( function() {			
			var scrollActive = 'scroll-top-active';			
			if ( _window.scrollTop() >= ( $( window ).height() / 2)) {
				body.addClass( scrollActive );
			}
			else {
				body.removeClass( scrollActive );
			}
		});
		
		$('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                            scrollTop: target.offset().top
                    }, 5000);
                    return false;
                }
            }
        });
	} );
	
	
	// Search Bar
	$( function () {
		var searchbar = $('#search-bar'),
			searchicon = $('.site-header .search-bar-title'),
			statussearchbaractive = 'status-search-bar-active',
			searchbaractive = 'search-bar-active',
			searchbarinactive = 'search-bar-inactive';
		
		searchicon.on( 'click.hopscotch', function(e){
			body.toggleClass('status-search-bar-active');
			searchbar.toggleClass( searchbarinactive ).toggleClass( searchbaractive );
			$( this ).parents( searchbar ).find('.site-header .search-field').focus();
			e.stopPropagation();
		});
		
		searchbar.on( 'click.hopscotch', function(e){
			e.stopPropagation();
		});
		
		// Hide main nav
		function searchOff() {
			searchbar.toggleClass( searchbarinactive ).toggleClass( searchbaractive );
			body.toggleClass( statussearchbaractive );
		};
		
		$(document).on( 'click.hopscotch', function() {
			if ( searchbar.hasClass( searchbaractive )) {
				searchOff();
			}
		});
		
		$(document).on( 'keydown.hopscotch', function(e) {
			if (e.which === 27 && searchbar.hasClass( searchbaractive )) {
				searchOff();
			}
		});
		
	} );
	
	
	// Various
	$( function () {
		
		// Focusing on form UIs
		var form = $( 'form' );
		
		$( form ).on('focus', 'input, textarea, button', function() {
			$(this).parent().toggleClass('status-focus-on');
		});
		$( form ).on('focusout', 'input, textarea, button', function() {
			$(this).parent().toggleClass('status-focus-on');
		});
		
		// Check if nav li has children
		$('.nav-menu .menu-item:has(.children, .sub-menu), .nav-menu .page_item:has(.children, .sub-menu)').addClass('parent-menu');
		
		// Define orientation of images
		$('.entry-ct img').each(function(){
			$(this).addClass(this.width > this.height ? 'image-landscape' : 'image-portrait');
		});
        
        // WP: remove "novalidate" from Comment Form
        $("#comment-form").removeAttr("novalidate");
   
    } );
	
    // Add class to image parents
	$( function () {
        $('.image-cr img:not([class])').closest('.image-cr').addClass('image-align-center');
        $('.image-cr img.alignnone').closest('.image-cr').addClass('image-align-none');
        $('.image-cr img.aligncenter').closest('.image-cr').addClass('image-align-center');
        $('.image-cr img.alignright').closest('.image-cr').addClass('image-align-right');
        $('.image-cr img.alignleft').closest('.image-cr').addClass('image-align-left');
	} );
	
} )( jQuery );