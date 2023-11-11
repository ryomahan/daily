<?php
get_header();

$args = array(
    "post_type" => array("post"),
    "post_status" => array("publish"),
    "tax_query" => array(
        "relation" => "AND",
        array(
            "taxonomy" => "category",
            "field" => "slug",
            "terms" => array( "uncategorized" ),
            "operator" => "NOT IN",
            "include_children" => true,
        ),
    )
);
$query = new WP_Query( $args );

if ( $query -> have_posts() ) {
    while ( $query -> have_posts() ) {
        $query -> the_post();
        get_template_part( 'template-parts/page/home' );
    }
}

get_footer();