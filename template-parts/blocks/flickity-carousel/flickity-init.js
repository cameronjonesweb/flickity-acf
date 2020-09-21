(function ($) {
	/**
	 * initializeBlock
	 *
	 * Adds custom JavaScript to the block HTML.
	 *
	 * @date    15/4/19
	 * @since   1.0.0
	 *
	 * @param   object $block The block jQuery element.
	 * @param   object attributes The block attributes (only available when editing).
	 * @return  void
	 */
	var initializeBlock = function ($block) {
		$carousel = $block.find('.gallery-carousel');
		$carousel.flickity({
			imagesLoaded: true, // re-positions cells once their images have loaded
			groupCells: true, // group cells that fit in carousel viewport
			// adaptiveHeight: true,
			cellAlign: $carousel.data( 'cellalign' ),
			freeScroll: true, // enables content to be freely scrolled and flicked without aligning cells to an end position
			wrapAround: true,
		});
	};

	// Initialize each block on page load (front end).
	$(document).ready(function () {
		$('.flickity-carousel').each(function () {
			initializeBlock( $( this ) );
		});
	});

	// Initialize dynamic block preview (editor).
	if (window.acf) {
		window.acf.addAction(
			'render_block_preview/type=flickity-carousel',
			initializeBlock
		);
	}
})(jQuery);
