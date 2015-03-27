// Based on WordPress Twentyfifteen functions file.
// Contains handlers for navigation and widget area.

( function( $ ) {
    var $body = $( document.body ),        
        $html = $( 'html' ),
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

    
    //------------------------- Primary Navigation and Masthead Sidebar Toggle
    ( function() {
        var priNavMastheadSidebarComp = $( '#primary-nav-masthead-sidebar_comp' ),
            priNavMastheadSidebarToggleAxn = $( '#primary-nav-masthead-sidebar-toggle_axn' );
        
        if ( ! priNavMastheadSidebarComp ) {
            return;
            
        if ( ! priNavMastheadSidebarToggleAxn ) {
            return;
        }
    }

        priNavMastheadSidebarToggleAxn.on( 'click.hopscotch', function() {
        
            // Inactive state class is set at: functions > body-class.php
            $body.toggleClass( 'hs-state__primary-nav-masthead-sidebar--inactive hs-state__primary-nav-masthead-sidebar--active' );
            priNavMastheadSidebarComp.attr( 'aria-expanded', $body.hasClass( 'hs-state__primary-nav-masthead-sidebar--active' ) ? 'true' : 'false' );
        } );
        
    } )();
    
  
    //-------------------------  Viewport resizing
    function resize() {
        var viewportNarrowClass = 'hs-viewport--narrow',
            viewportWideClass = 'hs-viewport--wide',
            statePriNavMastheadSidebarActiveClass = 'hs-state__primary-nav-masthead-sidebar--active',
            statePriNavMastheadSidebarInactiveClass = 'hs-state__primary-nav-masthead-sidebar--inactive';
            
        windowWidth = $window.width();

        /*
        Screen width detection
        If Tablet size (768) is greater than the window width, then that must mean the viewport is either equal to 768 or narrower.
        */
        if (769 > windowWidth) {
            $html.addClass( viewportNarrowClass );
            $html.removeClass( viewportWideClass );
        } else {
            $html.addClass( viewportWideClass );
            $html.removeClass( viewportNarrowClass );
        }

        // If screen is narrow, deactivate primary navigation
        if ( $html.hasClass( viewportNarrowClass ) ) {
            $body.removeClass( statePriNavMastheadSidebarActiveClass );
            $body.addClass( statePriNavMastheadSidebarInactiveClass );
        } else {
            $body.removeClass( statePriNavMastheadSidebarInactiveClass );
            $body.addClass( statePriNavMastheadSidebarActiveClass );
        }

    }
    
    
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
            
            stateSearchActive = 'hs-state__search--active',
            stateSearchInactive = 'hs-state__search--inactive',
            
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
        if ( $html.hasClass( 'hs-template__search--lightsaber' ) ) {
            
            // Deactivates the Search
            function searchLightsaberDeactivate() {
                if ( $body.hasClass( 'hs-state__search_lightsaber--active' ) ) {
                    $body.removeClass( 'hs-state__search_lightsaber--active' ).addClass( 'hs-state__search_lightsaber--inactive' );
                }
            }
            
            $body.addClass( 'hs-state__search_lightsaber--inactive' );
            
            mastheadSidebarSearchFormInput.on( 'focus.hopscotch', function() {
                $body.removeClass( 'hs-state__search_lightsaber--inactive' ).addClass( 'hs-state__search_lightsaber--active' );
            } );
            
            mastheadSidebarSearchFormLabel.on( 'click.hopscotch', function( e ){        
                e.stopPropagation();

                // Deactivate other Search
                searchLightsaberDeactivate();
                $body.removeClass( 'hs-state__search_lightsaber--inactive' ).addClass( 'hs-state__search_lightsaber--active' );
            } );
            
            // If Search Component is active, make inactive by clicks anywhere on the document
            $( document ).on( 'click.hopscotch', function() {
                searchLightsaberDeactivate();
            });

            // Exempts the Search Component from the document click
            mastheadSidebarSearch.on( 'click.hopscotch', function( e ){
                e.stopPropagation();
            });

            // ESC
            $( document ).on( 'keyup.hopscotch', function( e ) {
                if ( e.which === 27 ) {
                    searchLightsaberDeactivate();
                    searchInput.blur();
                }
            });
        }
        
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