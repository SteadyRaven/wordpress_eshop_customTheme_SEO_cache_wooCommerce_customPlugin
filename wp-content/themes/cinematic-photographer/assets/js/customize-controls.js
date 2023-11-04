( function( api ) {

	// Extends our custom "cinematic-photographer" section.
	api.sectionConstructor['cinematic-photographer'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );