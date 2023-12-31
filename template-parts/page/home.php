<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (is_singular()) : ?>
            <?php the_title('<h1 class="entry-title default-max-width">', '</h1>'); ?>
        <?php else : ?>
            <?php the_title(sprintf('<h2 class="entry-title default-max-width"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
        <?php endif; ?>
    </header>

    <main class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
                'after'    => '</nav>',
                'pagelink' => esc_html__('Page %', 'twentytwentyone'),
            )
        );

        ?>
    </main>

    <footer class="entry-footer default-max-width">
    </footer>
</article>