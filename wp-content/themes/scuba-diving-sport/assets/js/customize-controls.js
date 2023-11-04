( function( api ) {

	// Extends our custom "scuba-diving-sport" section.
	api.sectionConstructor['scuba-diving-sport'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );