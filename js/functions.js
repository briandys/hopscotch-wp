(function ($) {
	var html    = $( 'html' ),
		body    = $( 'body' ),
	    _window = $( window );

	
	( function() {
		
		var mainNav = $( '#main-navigation' ), mainNavControl, overlay, navMenu, mainNavActive, mainNavInactive;
		if ( ! mainNav )
			return;

		mainNavControl = mainNav.find( '#main-navigation-control' );
		if ( ! mainNavControl )
			return;
        
        mainNavContent = mainNav.find( '.main-navigation-ct' );
		if ( ! mainNavContent )
			return;

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
		$( mainNavContent ).on( 'click.hopscotch', function(e) {
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
    
    
	// Header Search
	$( function () {
		var search = $( '#header-sidebar .search' ),
			searchControl = $( '#search-control' ),
            searchField = $( '#header-sidebar .search-input' ),
			searchActive = 'status-search-active',
			searchInactive = 'status-search-inactive';
        
        if( ! search )
            return;
        
        if( ! searchControl )
            return;
        
        if( ! searchField )
            return;
		
		searchControl.on( 'click.hopscotch', function(e){
			body.toggleClass( searchActive ).toggleClass( searchInactive );
			$( searchField ).focus();
			e.stopPropagation();
		});
		
		search.on( 'click.hopscotch', function(e){
			e.stopPropagation();
		});
		
		// Hide main nav
		function searchToggle() {
			body.toggleClass( searchActive ).toggleClass( searchInactive );
		};
		
		$(document).on( 'click.hopscotch', function() {
			if ( body.hasClass( searchActive )) {
				searchToggle();
			}
		});
		
		$(document).on( 'keydown.hopscotch', function(e) {
			if (e.which === 27 && body.hasClass( searchActive )) {
				searchToggle();
			}
		});
		
	} );

	
	// WP: Twenty Fourteen - Makes "skip to content" link work correctly in IE9 and Chrome for better accessibility
	_window.on( 'hashchange', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
				element.tabIndex = -1;

			element.focus();
		}
	} );
    
    
    // Smooth scroll
    $( function () {
        
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
                        $('body').animate({
                                scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    } else {
                        $('html,body').animate({
                                scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            }
        });
        
    } );
	
	
	// Scroll Top
	$( function () {
		_window.scroll( function() {			
			
            var scrollTopActive = 'status-scroll-top-active',
                scrollTopInactive = 'status-scroll-top-inactive';
			
            function scrollTopActivate() {
                body.addClass( scrollTopActive );
                body.removeClass ( scrollTopInactive );
            };
			
            function scrollTopDeactivate() {
                body.addClass( scrollTopInactive );
                body.removeClass ( scrollTopActive );
            };
            
            if ( $(window).scrollTop() > ( $( window ).height() / 2)) {
				scrollTopActivate();
			} else {
                scrollTopDeactivate();
            }
            
            var mastheadHeight = $('#masthead').height(); 
            
            if ( $(window).scrollTop() > mastheadHeight ) {
                $( body ).addClass('sticky');
            } else {
                $( body ).removeClass('sticky');
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