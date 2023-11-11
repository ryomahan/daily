
<header>
    <div class="daily-name">
        <h1><?php bloginfo("name") ?></h1>
    </div>
<?php
    wp_nav_menu(
        array(
            'theme_location'  => 'header',
            "container" => false,
            "menu_class" => "daily-nav",
            'items_wrap' => '<div class="%2$s">%3$s</div>',
            "walker" => new NavMenuWalker(),
        )
    );
?>
</header>