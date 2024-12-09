<?php

get_header();

$s = get_search_query();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    's' => $s,
    'paged' => $paged
);

$the_query = new WP_Query($args);

?>


<?= do_blocks('
<!-- wp:bn/hero-page {"name":"bn/hero-page","data":{"title":"' . __('Results For:') . ' ' . $s . '", "subtitle" : "' . __('Search Results Found For:') . ' ' . $s . '"}} /-->
') ?>

<section class="fullwidth flex vertical vertical__center search-result">
    <div class="boxwidth row horizontal__center">
        <?php
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();

                if (empty(get_the_excerpt())) {
                    $content = content_gutenberg_acf_to_excerpt(get_the_content());
                } else {
                    $content = get_the_excerpt();
                } ?>
                
                <div class="col col-xxs-12 col-sm-10 col-sm-offset-1 search-result__col">
                    <h2 class="search-result__col--title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                    <p class="search-result__col--excerpt"><?= $content ?></p>
                    <a href="<?php the_permalink() ?>" class="search-result__col--link"><?php the_permalink() ?></a>
                </div>
        <?php
            }
        } else {
            echo '<p>' . __('Sorry, but nothing matched your search criteria. Please try again with some different keywords/') . '</p>';
        }

        ?>

        <div class="col col-xxs-12">
            <?php
            $pagination =   paginate_links(array(
                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format' => '?page=%#%',
                'current' => max(1, $paged),
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'prev_text' =>  '',
                'next_text' =>  '',
                'type' => 'array'
            ));

            include(TMPSHARED . 'pagination.php');
            ?>
        </div>
    </div>
</section>

<?php
// If you need more content on this page, try add reusable block and include below
//echo do_blocks('<!-- wp:block {"ref":0000} /-->');

get_footer();
?>