<?php
    // Some of the styles here are missing - you need to add them or delete some of the elements.
    // This code is just to make it easier to achieve basic flow of this page
    get_header();

    $queried_object = get_queried_object();
?>

<section class="fullwidth flex vertical vertical__center hero-page">
    <div class="boxwidth row horizontal__center hero-page__inner">
        <?php if ($breadcrumbs) : ?>
            <div class="col-xxs-12">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p class="breadcrumbs">', '</p>');
                }
                ?>
            </div>
        <?php endif; ?>
        <div class="col-xxs-12">
            <h1 class="title">Author: <?= $queried_object->display_name ?></h1>
        </div>
    </div>
</section>
<div class="section boxwidth">
    <div class="row boxwidth">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_loop = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'author' => $queried_object->ID,
                'paged' => $paged
            ));

            if ($posts_loop->have_posts()) :
                while ($posts_loop->have_posts()) :
                    $posts_loop->the_post();
                    $cats =      get_the_terms(get_the_ID(), 'category');
                    $post_date = get_the_date('d.m.Y');
                    $img =       wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'browse');
                    $excerpt =   content_gutenberg_acf_to_excerpt(get_the_content());
                ?>
                    <div class="col col-xxs-12 col-xs-12 col-sm-6 col-md-6 col-lg-3 <?= $visibility ?>">
                        <div class="cpt-box --post">
                            <div href="<?= get_the_permalink() ?>" class="cpt-box__cover">
                                <img src="<?= is_array($img) ?  $img[0] : '' ?>" alt="<?= get_the_title() ?>" class="cpt-box__cover--img">
                            </div>
                            <?php if ( !empty($cats) ) { ?>
                                <div class="cpt-box__cats">
                                    <?php foreach ($cats as $cat) {
                                            echo '<a href='. get_category_link($cat->term_id) .'>' . $cat->name . '</a>';
                                    } ?>
                                </div>
                            <?php } ?>
                            <div class="cpt-box__info">
                                <div class="cpt-box__add-info">
                                    <div class="cpt-box__author flex">
                                        <?= get_avatar( get_the_author_meta( 'ID' ), 32 ) ?>
                                        <a href="<?= get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?= get_the_author() ?></a>
                                    </div>
                                    <div class="cpt-box__date"><?= $post_date ?></div>
                                </div>
                                <h3 class="cpt-box__title"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
        ?>
        <div class="col col-xxs-12">
            <?php
            /**
             *
             * Pagination
             *
             */
            $pagination = paginate_links(array(
                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format' => '?page=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $posts_loop->max_num_pages,
                'mid_size' => 1,
                'prev_text' =>  '',
                'next_text' =>  '',
                'type' => 'array'
            ));
            include(TMPSHARED . 'pagination.php');

            ?>
        </div>
    </div>
</div>

<?php get_footer();