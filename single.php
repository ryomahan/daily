<?php
get_header();

while (have_posts()) {
?>
    <main>
        <section class="article">
            <?php the_post(); ?>
            <?php get_template_part("template-parts/page/single"); ?>
        </section>
        <section class="sidebar">
            <?php get_sidebar("right") ?>
        </section>
    </main>
<?php
}

get_footer();
