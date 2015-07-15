/**
 * Based on WordPress Twentyfifteen functions file.
 *
 * Contains handlers for navigation and widget arean.
 */


( function( $ ) {
  var $body, $window, windowWidth, resizeTimer;
  
  
  /*
  Nav Tree Toggle
  Upon activation of Toggle button, toggle active and inactive classes on nav-item.
  
  Elements involved:
  - toggle_axn: <button>
  - nav-item: <li>
  */
  
  /*
  Classify: parent_nav-item
  ui-type__nav-item--tree-nav
  ui-state__tree-nav--inactive
  
  Attribute: parent_nav-item
  aria-expanded="false"
  */
  $( '.parent_nav-item, .page_item_has_children, .menu-item-has-children' ).addClass( 'ui-type__nav-item--tree-nav ui-state__tree-nav--inactive' ).attr( 'aria-expanded', 'false' );
  
  // Add <button> element to Toggle Sub Nav
  $( '.parent_nav-item > a, .page_item_has_children > a, .menu-item-has-children > a' ).after( '<button class="toggle_axn">Toggle Sub Navigation</button>' );
  
  $( '.toggle_axn' ).click( function( e ) {
    var _this = $( this );
    e.preventDefault();
    _this.parent( '.nav-item, .page_item, .menu-item' ).toggleClass( 'ui-state__tree-nav--inactive ui-state__tree-nav--active' ).attr( 'aria-expanded', _this.parent( '.nav-item, .page_item, .menu-item' ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
  });
  
  
  /*
  Mobile Primary Navigation Toggle
  */
  
  ( function() {
    var navSidebarMastheadComp = $( '#nav-sidebar-masthead_comp' ), priNavToggleAxn, menu, widgets, social;
    if ( ! navSidebarMastheadComp ) {
      return;
    }
    
    priNavToggleAxn = $( '#pri-nav_toggle-axn' );
    if ( ! priNavToggleAxn ) {
      return;
    }
    
    priNavToggleAxn.on( 'click.hopscotch', function() {
      navSidebarMastheadComp.toggleClass( 'ui-state__nav-sidebar-masthead--inactive ui-state__nav-sidebar-masthead--active' ).attr( 'aria-expanded', navSidebarMastheadComp.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
    } )
  } )();
  
  
  // Viewport resizing
  function resize() {
    windowWidth = $window.width();

    /*
    Screen width detection
    If Tablet size (768) is greater than the window width, then that must mean the viewport is either equal to 768 or narrower.
    */
    if (769 > windowWidth) {
      $body.addClass( 'ui-type__screen--narrow' );
      $body.removeClass( 'ui-type__screen--wide' );
    } else {
      $body.addClass( 'ui-type__screen--wide' );
      $body.removeClass( 'ui-type__screen--narrow' );
    }

    // If screen is narrow, deactivate primary navigation
    if ( $body.hasClass( 'ui-type__screen--narrow' ) ) {
      $( '#pri-nav_nav' ).removeClass( 'ui-state__pri-nav--active' );
      $( '#pri-nav_nav' ).addClass( 'ui-state__pri-nav--inactive' );
    } else {
      $( '#pri-nav_nav' ).removeClass( 'ui-state__pri-nav--inactive' );
      $( '#pri-nav_nav' ).addClass( 'ui-state__pri-nav--active' );
    }

  }

  $( document ).ready( function() {
    $body = $( document.body );
    $window = $( window );

    $window
      .on( 'resize.hopscotch', function() {
      clearTimeout( resizeTimer );
      resizeTimer = setTimeout( resize, 500 );
    } );

    resize();

    for ( var i = 1; i < 6; i++ ) {
      setTimeout( resize, 100 * i );
    }
  });
  
  
} )( jQuery );