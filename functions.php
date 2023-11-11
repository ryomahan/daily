<?php
require get_template_directory() . "/classes/OptionsPanel.php";
require get_template_directory() . "/classes/NavMenuWalker.php";
require get_template_directory() . "/inc/template-functions.php";

if (!function_exists("daily_setup")) {

    function daily_setup()
    {
        // Let WordPress manage the document title.
        add_theme_support("title-tag");
        add_theme_support("menus");
        add_theme_support("widgets");

        register_nav_menus(
            array(
                "header" => esc_html__("顶部", "daily"),
            )
        );
    }
}
add_action("after_setup_theme", "daily_setup");

function register_daily_widget()
{
    register_sidebar(
        array(
            'id'            => 'sidebar-widget',
            'name'          => __('侧边栏', 'daily'),
            'description'   => __('显示在所有页面的侧边', 'daily'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'register_daily_widget');

// add style.css link
function register_daily_styles()
{
    wp_enqueue_style("daily-style", get_template_directory_uri() . "/style.css", array(), wp_get_theme()->get("Version"));
}
add_action("wp_enqueue_scripts", "register_daily_styles");


function register_daily_scripts()
{
    wp_enqueue_script("jquery");
    wp_enqueue_script("daily-app-script", get_template_directory_uri() . "/assets/js/app.js", array("jquery"), wp_get_theme()->get("Version"));
    wp_localize_script("daily-app-script", "wp", array(
        "home" => get_bloginfo("url")
    ));
}
add_action("wp_enqueue_scripts", "register_daily_scripts");


$setting_page_args = array(
    "slug" => "daily_settings",
    "title" => "主题配置",
    "parent" => "themes.php",
    "option_name" => "daily_settings",
    "user_capability" => "manage_options",
);

$setting_page_fields = [
    'option_1' => [
        'label'       => esc_html__( 'Checkbox Option', 'text_domain' ),
        'type'        => 'checkbox',
        'description' => 'My checkbox field description.',
    ],
    'option_2' => [
        'label'       => esc_html__( 'Select Option', 'text_domain' ),
        'type'        => 'select',
        'description' => 'My select field description.',
        'choices'     => [
            ''         => esc_html__( 'Select', 'text_domain' ),
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
    ],
    'option_3' => [
        'label'       => esc_html__( 'Text Option', 'text_domain' ),
        'type'        => 'text',
        'description' => 'My field 1 description.',
    ],
    'option_4' => [
        'label'       => esc_html__( 'Textarea Option', 'text_domain' ),
        'type'        => 'textarea',
        'description' => 'My textarea field description.',
    ],
];

new OptionsPanel( $setting_page_args, $setting_page_fields );


function register_daily_templates()
{
    $templates = array(
        'template-parts/page/about.php' => "关于页面",
        'template-parts/page/archive.php' => "归档页面",
    );
    return $templates;
}
add_filter('theme_page_templates', 'register_daily_templates');
