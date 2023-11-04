( function( window, document ) {
  function cinematic_photographer_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const cinematic_photographer_nav = document.querySelector( '.sidenav' );
      if ( ! cinematic_photographer_nav || ! cinematic_photographer_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...cinematic_photographer_nav.querySelectorAll( 'input, a, button' )],
        cinematic_photographer_lastEl = elements[ elements.length - 1 ],
        cinematic_photographer_firstEl = elements[0],
        cinematic_photographer_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && cinematic_photographer_lastEl === cinematic_photographer_activeEl ) {
        e.preventDefault();
        cinematic_photographer_firstEl.focus();
      }
      if ( shiftKey && tabKey && cinematic_photographer_firstEl === cinematic_photographer_activeEl ) {
        e.preventDefault();
        cinematic_photographer_lastEl.focus();
      }
    } );
  }
  cinematic_photographer_keepFocusInMenu();
} )( window, document );