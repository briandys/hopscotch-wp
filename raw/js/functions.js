(function ($) {
	var html    = $( 'html' ),
		body    = $( 'body' ),
	    _window = $( window ),
        wideViewportClass = 'type-wide-viewport';

	
    //------------------------- Media query for wide or narrow viewport
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
    
    
    //------------------------- Main navigation toggle for narrow viewport mode
	( function() {
		
		var mainNav = $( '#main-navigation' ),
            mainNavControl = mainNav.find( '#main-navigation-heading' ),
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
		uiStateMainNavActive = 'ui-state__main-nav--active';
		mainNavInactive = 'status-mobile-main-nav-inactive';
		mainNavStateInactive = 'ui-state__main-nav--inactive';
        overlayActive = 'status-overlay-active';

		function navToggle() {
			$( html ).toggleClass( mainNavActive ).toggleClass( uiStateMainNavActive ).toggleClass( mainNavInactive ).toggleClass( mainNavStateInactive ).toggleClass( overlayActive );
		};
		
        // Activates the nav
		mainNavControl.on( 'click.hopscotch', function(e) {
			navToggle();
            
            if ( body.hasClass( searchActive )) {
				searchToggle();
                searchDeactivate();
			}
            
			e.stopPropagation();
		} );
		
        // Prevents the actual nav to deactivate the nav
		navMenu.on( 'click.hopscotch', function(e) {
			e.stopPropagation();
		});
		
        // Overlay deactivates the nav
		mainNavContent.on( 'click.hopscotch', function(e) {
			if ( html.hasClass( uiStateMainNavActive )) {
				navToggle();
			}
		});
		
		$(document).on( 'keydown.hopscotch', function(e) {
			if (e.which === 27 && html.hasClass( uiStateMainNavActive )  ) {
				navToggle();
			}
		});
        
    } )();
    
    
    //------------------------- Sub navigation toggle for narrow and wide viewport
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
            
            // If the element is inactive
            if ( ! $(this).hasClass( subNavActive ) ) {
                
                // Make it active
                $(this).addClass( subNavActive ).removeClass( subNavInactive );
                
                // Deactivate the siblings
                $(this).siblings( '.page_item_has_children, .menu-item-has-children' ).removeClass( subNavActive ).addClass( subNavInactive );
                e.preventDefault();
            
            // Otherwise, if the element is active
            } else {
                
                // Make it inactive
                $(this).addClass( subNavInactive ).removeClass( subNavActive );
            }            
        });
        
        
        // Activating anywhere will close the active nav
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
    
    
    //------------------------- Search located on header
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

	
	//-------------------------  WP: Twenty Fourteen - Makes "skip to content" link work correctly in IE9 and Chrome for better accessibility
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
    
    
    //-------------------------  Smooth scroll
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
	
	
	//-------------------------  Scroll Top
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
    
    
    //-------------------------  Giving height to absolute elements
    ( function() {
        
        var entryMain = $( '.post.ui-type__entry-meta--meta-dashboard' );
        
        $( entryMain ).each(function(){
            
            var entryMetaHeight = $( this ).find( '.entry-hr .entry-meta' ).outerHeight( true ) + 48;
            $( this ).find( '.entry-cr' ).css( 'min-height', entryMetaHeight + 'px' );
            $( this ).find( '.entry-cr' ).css( 'min-height', entryMetaHeight + 'px' );
        
        });
        
    } )();
    
    
    //-------------------------  UI Tabs
	( function() {
		
		$( '.ui-tablist-item a' ).on( 'click', function(e) {
            
            var tab_id = $( this ).attr('aria-controls');
            
            $( '.ui-tablist-item a' ).attr('aria-selected', 'false');
            $( '.ui-tabpanel-item' ).attr('aria-hidden', 'true');
            
            $( this ).attr('aria-selected', 'true');
            $( "#"+tab_id ).attr('aria-hidden', 'false');
            
            e.preventDefault();
        })
        
    } )();
    
    
    //-------------------------  Focusing on form elements
	( function() {
		
		// Focusing on form UIs
		var ui_tabs = $( 'ui-tabs' ),
            form = $( 'form' ),
            form_elements = $( 'input, textarea, button' );
		
		form.on('focus', 'input, textarea, button', function() {
			$(this).parent().attr('data-state-form-element', 'focused');
		});
		
        form.on('focusout', 'input, textarea, button', function() {
			$(this).parent().attr('data-state-form-element', 'unfocused');
		});
        
        form_elements.on( 'focus', function() {
            $(this).parent().attr('data-state-form-element', 'focused');
        });
        
        form_elements.on( 'focusout', function() {
            $(this).parent().attr('data-state-form-element', 'unfocused');
        });
        
    } )();
    
    
    //-------------------------  <label> elements that enclose <input> elements
	( function() {
        $( 'label:has( input )' ).addClass( 'label-cr' );
    } )();
    
    
    //-------------------------  Adding 'parent-menu' to nav items with children
    ( function() {
		$('.menu-item:has(.children, .sub-menu), .page_item:has(.children, .sub-menu)').addClass('parent-menu');
	} )();
    
    
    //-------------------------  Define orientation of images
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
    
    
    //-------------------------  WP: remove "novalidate" from Comment Form
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
    
    
    //------------------------- Sticky Header
    $( function() {
        
        if ( $( body ).hasClass( 'ui-type__masthead--fixed-header' ) && ! $( body ).hasClass( 'admin-bar' ) ) {
            
            $(window).on('resize', function(){

                var mastheadHeight = $('#masthead').outerHeight( true ),
                    main = $( '#main' );          

                function mainApplyPadding() {
                    main.css( 'padding-top', mastheadHeight + 'px' );
                };

                mainApplyPadding();

            }).resize();
            
        };
    
    } );
    
	
} )( jQuery );