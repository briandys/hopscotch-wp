// Based on WordPress Twentyfifteen functions file.
// Contains handlers for navigation and widget area.

( function( $ ) {
    var $body = $( document.body ),        
        $html = $( 'html' ),
        viewportNarrowClass = 'hs-viewport--narrow',
        viewportWideClass = 'hs-viewport--wide',
        priNavMastheadSidebarHamburgerClass = 'hs-template__primary-nav-masthead-sidebar--hamburger',
        statePriNavMastheadSidebarHamburgerInactiveClass = 'hs-state__primary-nav-masthead-sidebar_hamburger--inactive',
        statePriNavMastheadSidebarHamburgerActiveClass = 'hs-state__primary-nav-masthead-sidebar_hamburger--active',
        $window, windowWidth, resizeTimer;
    
    //------------------------- Primary Navigation
    ( function() {
        
        var navItem = $( '.nav-item, .page_item, .menu-item' ),
            parentNavItem = $( '.parent-nav_item, .page_item_has_children, .menu-item-has-children' ),
            parentNavItemAction = $( '.parent_nav-item > a, .page_item_has_children > a, .menu-item-has-children > a' ),
            priNavItemTreeClass = 'hs-type__primary-nav-item--tree',
            priNavItemTreeActiveClass = 'hs-state__primary-nav-item_tree--active',
            priNavItemTreeInactiveClass = 'hs-state__primary-nav-item_tree--inactive',
            priSubNavToggleAction = '<button class="axn toggle_axn primary-sub-nav-toggle_axn" title="Toggle Sub-Navigation"><span class="label toggle_label">Toggle Sub-Navigation</span></button>';

        if( ! navItem )
          return;    

        if( ! parentNavItem )
          return;
       
        if( ! parentNavItemAction )
          return;
        
        // Sets default classes
        parentNavItem.addClass( priNavItemTreeClass + " " + priNavItemTreeInactiveClass ).attr( 'aria-expanded', 'false' );

        // Add <button> element to Toggle Sub Nav
        parentNavItemAction.after( priSubNavToggleAction );
        
        $( '.primary-sub-nav-toggle_axn' ).on( 'click.hopscotch', function( e ){
            var _this = $( this );
            e.preventDefault();
            _this.parent( navItem ).toggleClass( priNavItemTreeInactiveClass + " " + priNavItemTreeActiveClass ).attr( 'aria-expanded', _this.parent( navItem ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
        });
        
    } )();
    
    
    //-------------------------  Viewport Resizing
    function resize() {            
        windowWidth = $window.width();

        /*
        Screen width detection
        If Tablet Size (768) is greater than the window width, then that must mean the viewport is either equal to 768 or narrower.
        */
        if (769 > windowWidth) {
            $html.addClass( viewportNarrowClass );
            $html.removeClass( viewportWideClass );
        } else {
            $html.addClass( viewportWideClass );
            $html.removeClass( viewportNarrowClass );
        }

        if ( $html.hasClass( priNavMastheadSidebarHamburgerClass ) ) {
        
            // If screen is narrow, deactivate primary navigation
            if ( $html.hasClass( viewportNarrowClass ) ) {
                $body.removeClass( statePriNavMastheadSidebarHamburgerActiveClass );
                $body.addClass( statePriNavMastheadSidebarHamburgerInactiveClass );
            } else {
                $body.removeClass( statePriNavMastheadSidebarHamburgerInactiveClass );
                $body.addClass( statePriNavMastheadSidebarHamburgerActiveClass );
            }
            
        }

    }

    
    //------------------------- Primary Navigation and Masthead Sidebar Toggle
    ( function() {
        var priNavMastheadSidebarComp = $( '#primary-nav-masthead-sidebar_comp' ),
            priNavMastheadSidebarToggleAxn = $( '#primary-nav-masthead-sidebar-toggle_axn' );
        
        if ( ! priNavMastheadSidebarComp ) {
            return;
        }
            
        if ( ! priNavMastheadSidebarToggleAxn ) {
            return;
        }
        
        // Two main criteria: If using Hamburger Template and if Viewport is Narrow
        if ( $html.hasClass( priNavMastheadSidebarHamburgerClass && viewportNarrowClass ) ) {

            // Set Default Class
            $body.addClass( statePriNavMastheadSidebarHamburgerInactiveClass );
            
            priNavMastheadSidebarToggleAxn.on( 'click.hopscotch', function() {
                $body.toggleClass( statePriNavMastheadSidebarHamburgerInactiveClass + " " + statePriNavMastheadSidebarHamburgerActiveClass );
                priNavMastheadSidebarComp.attr( 'aria-expanded', $body.hasClass( statePriNavMastheadSidebarHamburgerActiveClass ) ? 'true' : 'false' );
            } );
        }
            
        // Deactivate Primary Navigation on clicks on the document body
        // https://css-tricks.com/dangers-stopping-event-propagation/
        $( document ).on( 'click.hopscotch', function( e ) {
            if ( $html.hasClass( priNavMastheadSidebarHamburgerClass && viewportNarrowClass ) && !$( event.target ).closest( '#primary-nav-masthead-sidebar-toggle_axn, #primary_nav' ).length ) {
                $body.removeClass( statePriNavMastheadSidebarHamburgerActiveClass ).addClass( statePriNavMastheadSidebarHamburgerInactiveClass );
            }                
        });
        
    } )();
    
    
    //-------------------------  Search Component
    ( function() {

        var search = $( '.search_comp' ),
            searchLabel = $( '.search-form_label' ),
            searchInput = $( '.search-form_input' ),
            
            mastheadSidebar = $( '#masthead_sidebar' ),
            contentSidebar = $( '#content_sidebar' ),
            colophonSidebar = $( '#colophon_sidebar' ),
            
            stateSearchFocused = 'hs-state__search--focused',
            stateSearchUnfocused = 'hs-state__search--unfocused',
            
            stateSearchLightsaberActiveClass = 'hs-state__search_lightsaber--active',
            stateSearchLightsaberInactiveClass = 'hs-state__search_lightsaber--inactive',
            
            mastheadSidebarSearch = mastheadSidebar.find( '.search_comp' ),
            mastheadSidebarSearchFormInput = mastheadSidebar.find( '.search-form_input' ),
            mastheadSidebarSearchFormLabel = mastheadSidebar.find( '.search-form_label' ),
            
            contentSidebarSearchFormInput = contentSidebar.find( '.search-form_input' ),
            contentSidebarSearchFormLabel = contentSidebar.find( '.search-form_label' ),
            
            colophonSidebarSearchFormInput = colophonSidebar.find( '.search-form_input' ),
            colophonSidebarSearchFormLabel = colophonSidebar.find( '.search-form_label' );

        if( ! search )
          return;

        if( ! searchLabel )
          return;

        if( ! mastheadSidebar )
          return;

        if( ! contentSidebar )
          return;

        if( ! colophonSidebar )
          return;
        
        // Search Lightsaber
        if ( $html.hasClass( 'hs-template__search--lightsaber' && 'hs-viewport--narrow' ) ) {
            
            // Deactivates the Search
            function searchLightsaberDeactivate() {
                if ( $body.hasClass( stateSearchLightsaberActiveClass ) ) {
                    $body.removeClass( stateSearchLightsaberActiveClass ).addClass( stateSearchLightsaberInactiveClass );
                }
            }
            
            // Set Default Class
            $body.addClass( stateSearchLightsaberInactiveClass );
            
            mastheadSidebarSearchFormInput.on( 'focus.hopscotch', function() {
                $body.removeClass( stateSearchLightsaberInactiveClass ).addClass( stateSearchLightsaberActiveClass );
            } );
            
            mastheadSidebarSearchFormLabel.on( 'click.hopscotch', function( e ){
                e.stopPropagation();

                // Deactivate other Search
                searchLightsaberDeactivate();
                $body.removeClass( stateSearchLightsaberInactiveClass ).addClass( stateSearchLightsaberActiveClass );
            } );            
        }
        
        // Deactivate Primary Navigation on clicks on the document body
        $( document ).on( 'click.hopscotch', function( e ) {
            if ( $html.hasClass( 'hs-template__search--lightsaber' ) && !$( event.target ).closest( mastheadSidebarSearch ).length ) {
                searchLightsaberDeactivate();
            }                
        });

        // ESC closes Deactivates the Search
        $( document ).on( 'keyup.hopscotch', function( e ) {
            if ( $html.hasClass( 'hs-template__search--lightsaber' ) && e.which === 27 ) {
                searchLightsaberDeactivate();
                searchInput.blur();
            }
        });
        
        // Differentiate the ID of Search Inputs
        contentSidebarSearchFormInput.attr( 'id', 'search-form-content-sidebar_input' );
        contentSidebarSearchFormLabel.attr( 'for', 'search-form-content-sidebar_input' );
        
        colophonSidebarSearchFormInput.attr( 'id', 'search-form-colophon-sidebar_input' );
        colophonSidebarSearchFormLabel.attr( 'for', 'search-form-colophon-sidebar_input' );

    } )();
    

    $( document ).ready( function() {
        $window = $( window );

        $window.on( 'resize.hopscotch', function() {
            clearTimeout( resizeTimer );
            resizeTimer = setTimeout( resize, 500 );
        } );

        resize();

        for ( var i = 1; i < 6; i++ ) {
            setTimeout( resize, 100 * i );
        }
    });
  
  
} )( jQuery );