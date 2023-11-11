<?php
get_header();

if (is_home()) {
    $args = array(
        "post_type" => array("post"),
        "post_status" => array("publish"),
        "tax_query" => array(
            "relation" => "AND",
            array(
                "taxonomy" => "category",
                "field" => "slug",
                "terms" => array("uncategorized"),
                "operator" => "NOT IN",
                "include_children" => true,
            ),
        )
    );
    $query = new WP_Query($args);

?>
    <main>
        <section class="article">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    get_template_part('template-parts/page/home');
                }
            }
            ?>
        </section>
        <section class="sidebar">
            <?php
            get_sidebar("right")
            ?>
        </section>
    </main>
<?php
}


get_footer();
