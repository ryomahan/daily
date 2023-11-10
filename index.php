<?php
get_header();

$query = new WP_Query( array( "category__not_in" => array(1) ) );

if ( $query -> have_posts() ) {
    while ( $query -> have_posts() ) {
        $query -> the_post();
        get_template_part( 'template-parts/page/home' );
    }
}

get_footer();