<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('post_columns_block_visibility') && is_array(get_field('post_columns_block_visibility'))) ? implode(' ', get_field('post_columns_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$type_of_posts = get_field('post_columns_type_of_posts') ? get_field('post_columns_type_of_posts') : 'post';
$number_of_posts = get_field('number_of_posts') ? get_field('number_of_posts') : '3';
$read_more = get_field('read_more') ? get_field('read_more') : '';
$is_slider = get_field('is_slider') ? get_field('is_slider') : false;

if ($is_slider) {
    $column_class = 'col-md-4';
} else {
    switch ($number_of_posts) {
        case 2:
            $column_class = 'col-md-6';
            break;
        case 3:
            $column_class = 'col-md-4';
            break;
        case 4:
            $column_class = 'col-md-6 col-lg-3';
            break;
        case 6:
            $column_class = 'col-md-4';
            break;
        case 8:
            $column_class = 'col-md-6 col-lg-3';
            break;
        case -1:
            $column_class = 'col-md-4';
            break;
    }
}

// Remember to give the appropriate classes for each type of post
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_loop = new WP_Query(array(
    'post_type' => $type_of_posts,
    'posts_per_page' => $number_of_posts,
    'paged' => $paged
));

if ($posts_loop->have_posts()) :
    echo ($is_slider) ? '<div class="post-slider ' . $visibility . '">' : '';
    while ($posts_loop->have_posts()) :
        $posts_loop->the_post();
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'browse');

        $excerpt = content_gutenberg_acf_to_excerpt(get_the_content());

        // Use this to give a different structure depending on the post type you choose
        switch ($type_of_posts) {
            case 'case1':
                break;
            case 'case2':
                break;
            default:
                break;
        }

?>
        <div class="col col-xxs-12 col-xs-12 col-sm-12 <?= $column_class ?> <?= $visibility ?>">
            <div class="cpt-box --<?= $type_of_posts ?>">
                <a href="<?= $is_preview ? '#void' : get_the_permalink() ?>" class="cpt-box__cover">
                    <img src="<?= is_array($img) ?  $img[0] : '' ?>" alt="<?= get_the_title() ?>" class="cpt-box__cover--img">
                </a>
                <div class="cpt-box__desc">
                    <h3 class="cpt-box__desc--title"><a href="<?= $is_preview ? '#void' : get_the_permalink() ?>"><?= get_the_title() ?></h3></a>
                    <?php if ($excerpt) : ?><p class="cpt-box__desc--excerpt excerpt-cut"><?= $excerpt ?></p><?php endif ?>
                    <a href="<?= $is_preview ? '#void' : get_the_permalink() ?>" class="cpt-box__desc--btn btn-flat-primary"><?= $read_more ?></a>
                </div>
            </div>
        </div>

<?php
    endwhile;
    echo ($is_slider) ? '</div>' : '';
endif;
?>