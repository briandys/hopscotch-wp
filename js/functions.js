(function ($) {
	var html    = $( 'html' ),
		body    = $( 'body' ),
	    _window = $( window ),
        wideViewportClass = 'type-wide-viewport';

	
    // Media query for wide or narrow viewport
    ( function() {
        
        $(window).on('resize', function(){
            
            var windowWidth = $(window).width(),
                nonMobileWidth = 768,
                narrowViewportClass = 'type-narrow-viewport';
            
            function mqNonMobile() {
                html.addClass( wideViewportClass );
                html.removeClass( narrowViewportClass );
                
            };

            function mqMobile() {
                html.addClass( narrowViewportClass );
                html.removeClass( wideViewportClass );
            };
            
            ( windowWidth >= nonMobileWidth ) ? mqNonMobile() : mqMobile();
        
        }).resize();
    
    } )();
    
    
    // Main navigation toggle for mobile mode
	( function() {
		
		var mainNav = $( '#main-navigation' ),
            mainNavControl = mainNav.find( '#main-navigation-control' ),
            mainNavContent = mainNav.find( '.main-navigation-ct' ),
            navMenu = mainNav.find( 'div.nav-menu > ul' );
		
        if ( ! mainNav )
			return;
		
		if ( ! mainNavControl )
			return;
        
		if ( ! mainNavContent )
			return;
		
		if ( ! navMenu || ! navMenu.children().length ) {
			mainNavControl.hide();
			return;
		}
		
		mainNavActive = 'status-mobile-main-nav-active';
		mainNavInactive = 'status-mobile-main-nav-inactive';
        overlayActive = 'status-overlay-active';

		function navToggle() {
			$( html ).toggleClass( mainNavActive ).toggleClass( mainNavInactive ).toggleClass( overlayActive );
		};
		
        // Activates the nav
		mainNavControl.on( 'click.hopscotch', function(e) {
			navToggle();
			e.stopPropagation();
		} );
		
        // Prevents the actual nav to deactivate the nav
		navMenu.on( 'click.hopscotch', function(e) {
			e.stopPropagation();
		});
		
        // Overlay deactivates the nav
		mainNavContent.on( 'click.hopscotch', function(e) {
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
    
   
    // Sub navigation toggle
    ( function() {
		
        var subNavMenuMain = $( 'div.nav-menu' ),
            subNavMenuParent = subNavMenuMain.find( '.page_item_has_children, .menu-item-has-children' ),
            subNavMenuChildren = subNavMenuParent.find( '.children, .sub-menu' ),
            subNavMenuControl = subNavMenuParent.children( 'a' ),
            subNavMenu = subNavMenuParent.find( '.children, .sub-menu' ),
            subNavActive = 'status-sub-nav-active',
            subNavInactive = 'status-sub-nav-inactive',            
            subNavMenuSecondParent = subNavMenu.find( subNavMenuParent );
        
        if( ! subNavMenuMain )
            return;
        
        if ( ! subNavMenuParent )
            return;
        
        if ( ! subNavMenuControl )
            return;
        
        if ( ! subNavMenu || ! subNavMenu.children().length ) {
            subNavMenu.hide();
            return;
        }
        
        function subNavToggle() {
            subNavMenuParent.addClass( subNavInactive );
			subNavMenuParent.removeClass( subNavActive ).siblings().removeClass( subNavActive );
		};
        
        subNavToggle();
        
        
        // Toggle list item; on second activation, go to link
        subNavMenuParent.on('click.hopscotch', function(e) {
            if ( ! $(this).hasClass( subNavActive ) ) {
                $(this).addClass( subNavActive ).removeClass( subNavInactive );
                $(this).siblings( '.page_item_has_children, .menu-item-has-children' ).removeClass( subNavActive ).addClass( subNavInactive );
                e.preventDefault();
            } else {
                $(this).addClass( subNavInactive ).removeClass( subNavActive );
            }            
        });
        
        
        // HTML toggle
		html.on( 'click.hopscotch', function(e) {
			if ( subNavMenuParent.hasClass( subNavActive )) {
				subNavToggle();
			}
		});
        
        // ESC key toggle
        $(document).on( 'keydown.hopscotch', function(e) {
			if (e.which === 27 && subNavMenuParent.hasClass( subNavActive )  ) {
				subNavToggle();
			}
		});
		
        subNavMenuChildren.on( 'click.hopscotch', function(e) {
			e.stopPropagation();
		});
        
        // Sub nav toggle for wide viewport
        subNavMenuSecondParent.on('click.hopscotch', function() {            
            if ( html.hasClass( wideViewportClass )) {				
                if ( $(this).hasClass( 'status-sub-nav-active' )) {                
                    $(this).nextAll().hide();
                } else {
                    $(this).nextAll().show();
                }                
			}            
        });
    
    } )();
    
    
	// Search located on header
	( function() {
        
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
		
        if ( body.hasClass( searchInactive )) {
            searchDeactivate();
        } else {
            searchActivate();
        }
		
		searchControl.on( 'click.hopscotch', function(e){
			searchToggle();
            
            if ( body.hasClass( searchActive )) {
                searchActivate();
            }
            
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
        
        function searchActivate() {
            body.attr('data-state-search', 'active');
        };

        function searchDeactivate() {
            body.attr('data-state-search', 'inactive');
        };
		
		$(document).on( 'click.hopscotch', function() {
			if ( body.hasClass( searchActive )) {
				searchToggle();
                searchDeactivate();
			}
		});
		
		$(document).on( 'keydown.hopscotch', function(e) {
			if (e.which === 27 && body.hasClass( searchActive )) {
				searchToggle();
                searchDeactivate();
			}
		});
		
	} )();

	
	// WP: Twenty Fourteen - Makes "skip to content" link work correctly in IE9 and Chrome for better accessibility
	( function() {
        
        _window.on( 'hashchange', function() {
            var element = document.getElementById( location.hash.substring( 1 ) );

            if ( element ) {
                if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
                    element.tabIndex = -1;

                element.focus();
            }
        } );
        
    } )();
    
    
    // Smooth scroll
    ( function() {
        
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
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            }
        });
        
    } )();
	
	
	// Scroll Top
	( function() {
		
        $(window).on('scroll', function(){
			
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
            
		}).scroll();
		
	} )();
    
    
    // Sticky footer
    ( function() {
        
        $(window).on('resize', function(){
            
            var windowHeight = $(window).height(),
                mastheadHeight = $('#masthead').outerHeight( true ),
                mainHeight = $('#main').outerHeight( true ),
                colophonHeight = $('#colophon').outerHeight( true ),
                contentHeight = mastheadHeight + mainHeight + colophonHeight;            
            
            function fixedFooterActivate() {
                body.addClass('status-vertical-content-overflow');
                body.removeClass('status-vertical-content-contain');
                body.attr('data-state-colophon', 'unfixed');
            };

            function fixedFooterDeactivate() {
                body.addClass('status-vertical-content-contain');
                body.removeClass('status-vertical-content-overflow');
                body.attr('data-state-colophon', 'fixed');
            };
            
            ( contentHeight > windowHeight ) ? fixedFooterActivate() : fixedFooterDeactivate();
        
        }).resize();
    
    } )();
    
    
    // UI Tabs
	( function() {
		
		$( '.ui-tablist-item a' ).on( 'click', function() {
            
            var tab_id = $( this ).attr('aria-controls');
            
            $( '.ui-tablist-item a' ).attr('aria-selected', 'false');
            $( '.ui-tabpanel-item' ).attr('aria-hidden', 'true');
            
            $( this ).attr('aria-selected', 'true');
            $( "#"+tab_id ).attr('aria-hidden', 'false');
        })
        
    } )();
    
    
    // Focusing on form elements
	( function() {
		
		// Focusing on form UIs
		var ui_tabs = $( 'ui-tabs' ),
            form = $( 'form' );
		
		form.on('focus', 'input, textarea, button', function() {
			$(this).parent().attr('data-state-form-element', 'focused');
		});
		
        form.on('focusout', 'input, textarea, button', function() {
			$(this).parent().attr('data-state-form-element', 'unfocused');
		});
        
    } )();
    
    
    // Adding 'parent-menu' to nav items with children
    ( function() {
		$('.menu-item:has(.children, .sub-menu), .page_item:has(.children, .sub-menu)').addClass('parent-menu');
	} )();
    
    
    // Define orientation of images
    ( function() {	
		
        $('.entry-ct img').each(function(){			
            if (this.width == this.height) {
                $(this).parents( '.img-cr' ).addClass( 'img-orientation-square' );
            } else if (this.width > this.height) {
                $(this).parents( '.img-cr' ).addClass( 'img-orientation-landscape' );
            } else if (this.width < this.height) {
                $(this).parents( '.img-cr' ).addClass( 'img-orientation-portrait' );
            }
		});
   
    } )();
    
    
    // WP: remove "novalidate" from Comment Form
    ( function() {
        $("#comment-form").removeAttr("novalidate");	
    } )();
    
    
    // Add alignment classes to image containers
	( function() {
		
        $('.entry-ct img').each(function(){			
            if ( $(this).is( '.alignleft' ) ) {
                $(this).parents( '.img-cr' ).addClass( 'img-alignment-left' );
            } else if ( $(this).is( '.alignright' ) ) {
                $(this).parents( '.img-cr' ).addClass( 'img-alignment-right' );
            } else if ( $(this).is( '.aligncenter' ) ) {
                $(this).parents( '.img-cr' ).addClass( 'img-alignment-center' );
            } else if ( $(this).is( '.alignnone' ) ) {
                $(this).parents( '.img-cr' ).addClass( 'img-alignment-none' );
            };
		});
   
    } )();
    
	
} )( jQuery );