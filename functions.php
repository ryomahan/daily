<?php
if ( ! function_exists( "daily_setup" ) ) {

	function daily_setup() {
		// Let WordPress manage the document title.
		add_theme_support( "title-tag" );
        add_theme_support( "menus" );

        register_nav_menus(
			array(
				"header_nav" => esc_html__( "顶部导航", "daily" ),
			)
		);
	}
}
add_action( "after_setup_theme", "daily_setup" );

// add style.css link
function daily_styles() {
    wp_enqueue_style( "daily-style", get_template_directory_uri() . "/style.css", array(), wp_get_theme()->get( "Version" ) );
}
add_action( "wp_enqueue_scripts", "daily_styles" );


function daily_scripts() {
    wp_enqueue_script( "jquery" );
    wp_enqueue_script( "daily-app-script", get_template_directory_uri() . "/assets/js/app.js", array("jquery"), wp_get_theme()->get( "Version" ) );
    wp_localize_script( "daily-app-script", "wp", array(
        "home" => get_bloginfo( "url" )
    ) );
}
add_action( "wp_enqueue_scripts", "daily_scripts" );

require get_template_directory() . "/inc/template-functions.php";
