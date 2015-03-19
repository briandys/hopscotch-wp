// Based on WordPress Twentyfifteen functions file.
// Contains handlers for navigation and widget area.

( function( $ ) {
    var $body, $html, $window, windowWidth, resizeTimer;
    
    //------------------------- Primary Navigation
    ( function() {
        
        var navItem = $( '.nav-item, .page_item, .menu-item' ),
            parentNavItem = $( '.parent-nav_item, .page_item_has_children, .menu-item-has-children' ),
            parentNavItemAction = $( '.parent_nav-item > a, .page_item_has_children > a, .menu-item-has-children > a' ),
            treeNavClass = 'hs-type__nav-item--tree-nav',
            treeNavActiveClass = 'hs-state__tree-nav--active',
            treeNavInactiveClass = 'hs-state__tree-nav--inactive',
            toggleAction = '<button class="axn toggle_axn sub-nav-toggle_axn" title="Toggle Sub-Navigation"><span class="label toggle_label">Toggle Sub-Navigation</span></button>';        

        if( ! navItem )
          return;    

        if( ! parentNavItem )
          return;
       
        if( ! parentNavItemAction )
          return;
        
        // Deactivates the Tree Nav
        function setTreeNavInactive() {
            parentNavItem.addClass( treeNavClass + " " + treeNavInactiveClass ).attr( 'aria-expanded', 'false' );
        }
        
        /*
        Nav Tree Toggle
        Upon activation of Toggle button, toggle active and inactive classes on nav-item.
        */
        setTreeNavInactive();
        

        // Add <button> element to Toggle Sub Nav
        parentNavItemAction.after( toggleAction );
        
        $( '.toggle_axn' ).on( 'click.hopscotch', function( e ){
            var _this = $( this );
            e.preventDefault();
            _this.parent( navItem ).toggleClass( treeNavInactiveClass + " " + treeNavActiveClass ).attr( 'aria-expanded', _this.parent( navItem ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
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
        
        // Differentiate the ID of search input
        contentSidebarSearchFormInput.attr( 'id', 'search-form-content-sidebar_input' );
        contentSidebarSearchFormLabel.attr( 'for', 'search-form-content-sidebar_input' );
        
        colophonSidebarSearchFormInput.attr( 'id', 'search-form-colophon-sidebar_input' );
        colophonSidebarSearchFormLabel.attr( 'for', 'search-form-colophon-sidebar_input' );        
        
        
        // Deactivates the Search
        function searchDeactivate() {
            if ( search.hasClass( stateSearchActive ) ) {
                search.removeClass( stateSearchActive ).addClass( stateSearchInactive );
            }
        }
        
        searchInput.on( 'focus.hopscotch', function() {
			$( this ).closest( search ).removeClass( stateSearchInactive ).addClass( stateSearchActive );
        } );
        
        // Converts the Search Label into a toggle action
        searchLabel.on( 'click.hopscotch', function( e ){        
            e.stopPropagation();
            
            // Deactivate other Search
            searchDeactivate();
            $( this ).closest( search ).removeClass( stateSearchInactive ).addClass( stateSearchActive );
        });
        
        

        // Exempts the Search Component from the document click
        search.on( 'click.hopscotch', function( e ){
            e.stopPropagation();
        });

        // If Search Component is active, make inactive by clicks anywhere on the document
        $( document ).on( 'click.hopscotch', function() {
            searchDeactivate();
        });

        // ESC
        $( document ).on( 'keyup.hopscotch', function( e ) {
            if ( e.which === 27 ) {
                search.removeClass( stateSearchActive ).addClass( stateSearchInactive );
                searchInput.blur();
            }
        });

    } )();
    

    $( document ).ready( function() {
        $html = $( 'html' );
        $body = $( document.body );
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