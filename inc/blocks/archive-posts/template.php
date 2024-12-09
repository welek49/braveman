<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('archive_posts_block_visibility') && is_array(get_field('archive_posts_block_visibility'))) ? implode(' ', get_field('archive_posts_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$type_of_posts = get_field('archive_posts_type_of_posts') ? get_field('archive_posts_type_of_posts') : 'galitzianer';
$number_of_posts = get_field('number_of_posts') ? get_field('number_of_posts') : -1;
$read_more = get_field('read_more') ? get_field('read_more') : '';
$view = get_field('view') ? get_field('view') : false;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_loop = new WP_Query(array(
    'post_type' => $type_of_posts,
    'posts_per_page' => $number_of_posts,
    'paged' => $paged
));

if ($posts_loop->have_posts()) :
    while ($posts_loop->have_posts()) :
        $posts_loop->the_post();
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'browse');
        $excerpt = content_gutenberg_acf_to_excerpt(get_the_content());


        if ($view) :
?>
            <div class="col col-xxs-12 <?= $visibility ?>">
                <div class="cpt-box --<?= $type_of_posts ?>">
                    <div class="cpt-box__desc">
                        <h3 class="cpt-box__desc--title"><a href="<?= $is_preview ? '#void' :get_the_permalink() ?>"><?= get_the_title() ?></h3></a>
                        <?php if ($excerpt) : ?><p class="cpt-box__desc--excerpt excerpt-cut"><?= $excerpt ?></p><?php endif ?>
                        <a href="<?= $is_preview ? '#void' : get_the_permalink() ?>" class="cpt-box__desc--btn btn-flat-primary"><?= $read_more ?></a>
                    </div>
                </div>
            </div>

        <?php else : ?>
            <div class="col col-xxs-12 col-xs-12 col-sm-12 col-md-4 <?= $visibility ?>">
                <div class="cpt-box --<?= $type_of_posts ?>">
                    <a href="<?= $is_preview ? '#void' : get_the_permalink() ?>" class="cpt-box__cover">
                        <img src="<?= is_array($img) ?  $img[0] : IMAGES . 'placeholder_cover.webp' ?>" alt="<?= get_the_title() ?>" class="cpt-box__cover--img">
                    </a>
                    <div class="cpt-box__desc">
                        <h3 class="cpt-box__desc--title"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></h3></a>
                        <?php if ($excerpt) : ?><p class="cpt-box__desc--excerpt excerpt-cut"><?= $excerpt ?></p><?php endif ?>
                        <a href="<?= $is_preview ? '#void' : get_the_permalink() ?>" class="cpt-box__desc--btn btn-flat-primary"><?= $read_more ?></a>
                    </div>
                </div>
            </div>

<?php
        endif;
    endwhile;
endif;

?>

<div class="col col-xxs-12">
    <?php
    // Pagination
    $pagination =   paginate_links(array(
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