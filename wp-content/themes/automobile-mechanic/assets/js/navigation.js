/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});

   	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	// Click event to scroll to top.
	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 500 );
		return false;
	});
});

function automobile_mechanic_open() {
	jQuery(".sidenav").addClass('show');
}
function automobile_mechanic_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function automobile_mechanic_menuAccessibility() {
	var links, i, len,
	    automobile_mechanic_menu = document.querySelector( '.nav-menu' ),
	    automobile_mechanic_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let automobile_mechanic_focusableElements = 'button, a, input';
	let automobile_mechanic_firstFocusableElement = automobile_mechanic_iconToggle; // get first element to be focused inside menu
	let automobile_mechanic_focusableContent = automobile_mechanic_menu.querySelectorAll(automobile_mechanic_focusableElements);
	let automobile_mechanic_lastFocusableElement = automobile_mechanic_focusableContent[automobile_mechanic_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! automobile_mechanic_menu ) {
    	return false;
	}

	links = automobile_mechanic_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === automobile_mechanic_firstFocusableElement) {
		        automobile_mechanic_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === automobile_mechanic_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	automobile_mechanic_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    automobile_mechanic_menuAccessibility();
  	});
});