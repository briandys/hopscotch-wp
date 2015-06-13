// Based on WordPress Twentyfifteen functions file.
// Contains handlers for navigation and widget area.

( function( $ ) {
    
    //------------------------- Generic Variables
    var $body = $( document.body ),        
        $html = $( 'html' ),
        $window, windowWidth, resizeTimer;
    
    //------------------------- Viewport Variables
    var viewportNarrowClass = 'hs-viewport--narrow',
        viewportWideClass = 'hs-viewport--wide',
        
        // UI Template Variables
        priNavMastheadSidebarHamburgerClass = 'hs-feature__primary-nav-masthead-sidebar--hamburger',
        statePriNavMastheadSidebarHamburgerInactiveClass = 'hs-state__primary-nav-masthead-sidebar_hamburger--inactive',
        statePriNavMastheadSidebarHamburgerActiveClass = 'hs-state__primary-nav-masthead-sidebar_hamburger--active',
        
        searchPoppySeedsClass = 'hs-feature__search--poppy-seeds',            
        stateSearchPoppySeedsActiveClass = 'hs-state__search_poppy-seeds--active',
        stateSearchPoppySeedsInactiveClass = 'hs-state__search_poppy-seeds--inactive',
        
        priNavVinesClass = 'hs-feature__primary-nav--vines',
        
        showTopMushroomClass = 'hs-mod__show-top--mushroom';
    
    //------------------------- Primary Navigation Variables
    var priNav = $( '#primary_nav' ),
        priNavItem = priNav.find( '.nav-item, .page_item, .menu-item' ),
        parentPriNavItem = priNav.find( '.parent-nav_item, .page_item_has_children, .menu-item-has-children' ),
        parentPriNavItemAction = priNav.find( '.parent_nav-item > a, .page_item_has_children > a, .menu-item-has-children > a' ),
        priNavItemTreeClass = 'hs-type__primary-nav-item--tree',
        priNavItemTreeActiveClass = 'hs-state__primary-nav-item_tree--active',
        priNavItemTreeInactiveClass = 'hs-state__primary-nav-item_tree--inactive',
        priSubNavToggleAction = '<button class="axn toggle_axn primary-sub-nav-toggle_axn" title="Toggle Sub-Navigation"><span class="label toggle_label">Toggle Sub-Navigation</span></button>',
        priNavItemTreeInactiveSiblingClass = 'hs-type__primary-nav-item_tree--inactive-sibling';

    if( ! priNav )
      return;

    if( ! priNavItem )
      return;

    if( ! parentPriNavItem )
      return;

    if( ! parentPriNavItemAction )
      return;
    
    //------------------------- Primary Navigation & Masthead Sidebar Variables
    var priNavMastheadSidebarComp = $( '#primary-nav-masthead-sidebar_comp' ),
        priNavMastheadSidebarToggleAxn = $( '#primary-nav-masthead-sidebar-toggle_axn' );

    if ( ! priNavMastheadSidebarComp ) {
        return;
    }

    if ( ! priNavMastheadSidebarToggleAxn ) {
        return;
    }    
    
    //-------------------------  Viewport Resizing
    function resize() {
        console.log( 'Resize' );
        windowWidth = $window.width();

        //-------------------------  Narrow or Wide Viewport
        // If Tablet Size (768) is greater than the window width, then that must mean the viewport is either equal to 768 or narrower.
        if ( 769 > windowWidth ) {
            $html.addClass( viewportNarrowClass );
            $html.removeClass( viewportWideClass );
        } else {
            $html.addClass( viewportWideClass );
            $html.removeClass( viewportNarrowClass );
        }
        
        function priNavMastheadSidebarHamburgerActivate() {
            $body.addClass( statePriNavMastheadSidebarHamburgerActiveClass ).removeClass( statePriNavMastheadSidebarHamburgerInactiveClass );
        }
        
        function priNavMastheadSidebarHamburgerDeactivate() {
            $body.addClass( statePriNavMastheadSidebarHamburgerInactiveClass ).removeClass( statePriNavMastheadSidebarHamburgerActiveClass );
        }
        
        //------------------------- Hamburger: Activate or Deactivate based on Viewport Width
        if ( $html.hasClass( priNavMastheadSidebarHamburgerClass ) ) {
            if ( $html.hasClass( viewportNarrowClass ) ) {
                console.log( 'Hamburger and Narrow' );
                priNavMastheadSidebarHamburgerDeactivate();
            } else {
                console.log( 'Hamburger and Wide' );
                priNavMastheadSidebarHamburgerActivate();
            }
        }
        
        // Deactivate Hamburger on External Activations
        // https://css-tricks.com/dangers-stopping-event-propagation/
        $( document ).on( 'click.hopscotch', function( e ) {
            if ( $html.hasClass( viewportNarrowClass ) && $body.hasClass( statePriNavMastheadSidebarHamburgerActiveClass ) && !$( event.target ).closest( '#primary-nav-masthead-sidebar-toggle_axn, #primary-nav-masthead-sidebar_comp' ).length ) {
                priNavMastheadSidebarHamburgerDeactivate();
            }                
        }); 
    }
    

    //-------------------------  Generic: Add Tree Class to Parent Items
    parentPriNavItem.addClass( priNavItemTreeClass );

    
    //-------------------------  Vines
    // Tree-like structure of navigation items
    ( function() {
        if ( $html.hasClass( priNavVinesClass ) ) {
            console.log( 'Vines' );

            // Add <button> element to Toggle Sub Nav
            parentPriNavItemAction.after( priSubNavToggleAction );

            // Set default state of Vine elements (inactive)
            parentPriNavItem.addClass( priNavItemTreeInactiveClass ).attr( 'aria-expanded', parentPriNavItem.hasClass( priNavItemTreeInactiveClass ) ? 'false' : 'true' );

            // Vines Toggle Action
            $( '.primary-sub-nav-toggle_axn' ).on( 'click.hopscotch', function( e ) {
                var _this = $( this );
                e.preventDefault();

                // Deactivate Siblings
                _this.parent( parentPriNavItem ).siblings( '.parent-nav_item, .page_item_has_children, .menu-item-has-children' ).removeClass( priNavItemTreeActiveClass ).addClass( priNavItemTreeInactiveClass ).attr( 'aria-expanded', $( this ).hasClass( priNavItemTreeInactiveClass ) ? 'true' : 'false' );

                // Activate Tree
                _this.parent( parentPriNavItem ).toggleClass( priNavItemTreeInactiveClass + " " + priNavItemTreeActiveClass ).attr( 'aria-expanded', _this.parent( parentPriNavItem ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

                // Identify Siblings of Active Tree Nav Item
                if (_this.parent( parentPriNavItem ).hasClass( priNavItemTreeActiveClass ) ) {
                    _this.parent( parentPriNavItem ).siblings().addClass( priNavItemTreeInactiveSiblingClass );
                } else {
                    _this.parent( parentPriNavItem ).siblings().removeClass( priNavItemTreeInactiveSiblingClass );
                }
            } );
        }
        
        //-------------------------  Deactivate Vines on external interaction (similar to Resetting the state of each Vine element)
        $( document ).on( 'click.hopscotch', function( e ) {
            if ( $html.hasClass( priNavVinesClass ) && !$( event.target ).closest( '.primary-sub-nav-toggle_axn' ).length ) {
                parentPriNavItem.removeClass( priNavItemTreeActiveClass ).addClass( priNavItemTreeInactiveClass ).attr( 'aria-expanded', parentPriNavItem.hasClass( priNavItemTreeInactiveClass ) ? 'false' :  'true' );
                parentPriNavItem.siblings().removeClass( priNavItemTreeInactiveSiblingClass );
            }                
        });
    } )();

    
    //-------------------------  Hamburger
    // Toggle Action of Primary Navigation and Masthead Sidebar
    ( function() {
        priNavMastheadSidebarToggleAxn.on( 'click.hopscotch', function() {
            if ( $html.hasClass( priNavMastheadSidebarHamburgerClass ) && $html.hasClass( viewportNarrowClass ) ) {
                console.log( 'Toggle Clicked and Burger Narrow');
                $body.toggleClass( statePriNavMastheadSidebarHamburgerInactiveClass + " " + statePriNavMastheadSidebarHamburgerActiveClass );
                priNavMastheadSidebarComp.attr( 'aria-expanded', $body.hasClass( statePriNavMastheadSidebarHamburgerActiveClass ) ? 'true' : 'false' );
            }
        } );
    } )();
    

    //-------------------------  Search Component
    ( function() {

        var search = $( '.search_comp' ),
            searchLabel = $( '.search-form_label' ),
            searchInput = $( '.search-form_input' ),

            mastheadSidebar = $( '#masthead_sidebar' ),
            contentSidebar = $( '#content_sidebar' ),
            colophonSidebar = $( '#colophon_sidebar' ),

            mastheadSidebarSearch = mastheadSidebar.find( '.search_comp' ),
            mastheadSidebarSearchFormInput = mastheadSidebar.find( '.search-form_input' ),
            mastheadSidebarSearchFormLabel = mastheadSidebar.find( '.search-form_label' ),
            mastheadSidebarSearchFormResetAction = mastheadSidebar.find( '.search-form_label' ),

            contentSidebarSearchFormInput = contentSidebar.find( '.search-form_input' ),
            contentSidebarSearchFormLabel = contentSidebar.find( '.search-form_label' ),

            colophonSidebarSearchFormInput = colophonSidebar.find( '.search-form_input' ),
            colophonSidebarSearchFormLabel = colophonSidebar.find( '.search-form_label' ),
            
            mastheadSidebarSearchClass = '#masthead_sidebar .search_comp',

            stateSearchFocused = 'hs-state__search--focused',
            stateSearchUnfocused = 'hs-state__search--unfocused';

        if( ! search )
          return;

        if( ! searchLabel )
          return;

        if( ! searchInput )
          return;

        if( ! mastheadSidebar )
          return;

        if( ! contentSidebar )
          return;

        if( ! colophonSidebar )
          return;

        if( ! mastheadSidebarSearch )
          return;

        if( ! mastheadSidebarSearchFormInput )
          return;

        if( ! mastheadSidebarSearchFormLabel )
          return;

        if( ! contentSidebarSearchFormInput )
          return;

        if( ! contentSidebarSearchFormLabel )
          return;

        if( ! colophonSidebarSearchFormInput )
          return;

        if( ! colophonSidebarSearchFormLabel )
          return;

        //-------------------------  Search Poppy Seeds        
        if ( $html.hasClass( searchPoppySeedsClass ) ) {

            // Set Default Class (inactive)
            $body.addClass( stateSearchPoppySeedsInactiveClass );

            // Deactivates the Search
            function searchPoppySeedsDeactivate() {
                if ( $body.hasClass( stateSearchPoppySeedsActiveClass ) ) {
                    $body.removeClass( stateSearchPoppySeedsActiveClass ).addClass( stateSearchPoppySeedsInactiveClass );
                }
            }

            // Activate Search on Focus on Input
            mastheadSidebarSearchFormInput.on( 'focus.hopscotch', function() {
                $body.removeClass( stateSearchPoppySeedsInactiveClass ).addClass( stateSearchPoppySeedsActiveClass );
                
                // Deactivate Hamburger on Search Focus
                if ( $body.hasClass( statePriNavMastheadSidebarHamburgerActiveClass ) && $html.hasClass( viewportNarrowClass ) ) {
                    $body.removeClass( statePriNavMastheadSidebarHamburgerActiveClass ).addClass( statePriNavMastheadSidebarHamburgerInactiveClass );
                }
            } );

            // Deactivate Search if input is empty and user activates Reset
            $( '#search-form-reset_axn' ).on( 'click.hopscotch', function() {
                if ( $( '#search-form_input' ).val() == '' ) {
                    searchPoppySeedsDeactivate();
                }                
            } );
        }

        //-------------------------  Deactivate Search on click on the document body
        $( document ).on( 'click.hopscotch', function( e ) {
            if ( $body.hasClass( stateSearchPoppySeedsActiveClass ) && !$( event.target ).closest( mastheadSidebarSearchClass ).length ) {
                console.log( 'Poppy Seeds Deactivated Externally');
                searchPoppySeedsDeactivate();
            }                
        });

        //-------------------------  Differentiate the ID of Search Inputs
        contentSidebarSearchFormInput.attr( 'id', 'search-form-content-sidebar_input' );
        contentSidebarSearchFormLabel.attr( 'for', 'search-form-content-sidebar_input' );

        colophonSidebarSearchFormInput.attr( 'id', 'search-form-colophon-sidebar_input' );
        colophonSidebarSearchFormLabel.attr( 'for', 'search-form-colophon-sidebar_input' );

    } )();
    

    //-------------------------  Smooth Scroll
    // https://css-tricks.com/snippets/jquery/smooth-scrolling/
    ( function() {        
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
                        $body.animate({
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
    

    //-------------------------  Show Top
    ( function() {
        if ( $html.hasClass( showTopMushroomClass ) ) {
            $( window ).on( 'scroll.hopscotch', function(){			
                var showTopActiveClass = 'hs-state__show-top--active',
                    showTopInactiveClass = 'hs-state__show-top--inactive';

                // Activate
                function showTopActivate() {
                    $body.addClass( showTopActiveClass ).removeClass( showTopInactiveClass );
                };

                // Deactivate
                function showTopDeactivate() {
                    $body.addClass( showTopInactiveClass ).removeClass( showTopActiveClass );
                };

                // Activation if near bottom
                if ( $( window ).scrollTop() > ( $( window ).height() / 2) ) {
                    showTopActivate();
                } else {
                    showTopDeactivate();
                }
            }).scroll();
        }
    } )();
    

    //-------------------------  WordPress Inadequacies
    
    // Remove <p>&nbsp;</p>
    $( '.post p' ).each( function() {
        var $this = $( this );
        if( $this.html().replace( /\s|&nbsp;/g, '' ).length == 0 )
            $this.remove();
    } );
    
    // Name the more-link container
    $( '.more-link' ).parents( 'p' ).addClass( 'more-link_cr' );
    

    $( document ).ready( function() {
        $window = $( window );
        
        // Set a delay for loading of elements
        setTimeout( function() {
            $html.addClass( 'hs-state__document--ready' );
        }, 500);

        $window.on( 'resize.hopscotch', function() {
            clearTimeout( resizeTimer );
            resizeTimer = setTimeout( resize, 500 );
        } );

        resize();

        // Unsure about why it sets it multiple times
        for ( var i = 1; i < 6; i++ ) {
            setTimeout( resize, 100 * i );
        }
    });
    
} )( jQuery );