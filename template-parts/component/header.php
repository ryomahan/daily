
<header class="flex">
    <div class="logo hover:text-blue-500 cursor-pointer select-none">
        <h1 class="text-3xl font-bold"><?php bloginfo("name") ?></h1>
        <h2 class="text-xl font-bold"><?php bloginfo("description") ?></h2>
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