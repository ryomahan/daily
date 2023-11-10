<?php
function daily_continue_reading_text() {
	$continue_reading = sprintf(
		/* translators: %s: Post title. Only visible to screen readers. */
		esc_html__( 'Continue reading %s', 'twentytwentyone' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	);

	return $continue_reading;
}
