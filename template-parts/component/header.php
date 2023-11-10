
<header class="flex">
    <div class="logo hover:text-blue-500 cursor-pointer select-none">
        <h1 class="text-3xl font-bold"><?php bloginfo("name") ?></h1>
        <h2 class="text-xl font-bold"><?php bloginfo("description") ?></h2>
    </div>
<?php
    wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'menu_class'      => 'menu-wrapper',
            'container_class' => 'primary-menu-container',
            'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
            'fallback_cb'     => false,
        )
    );
?>
</header>