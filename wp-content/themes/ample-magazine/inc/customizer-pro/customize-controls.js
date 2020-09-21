( function( api ) {

	// Extends our custom "ample-magazine" section.
	api.sectionConstructor['ample-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
