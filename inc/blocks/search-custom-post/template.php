<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

// ? Unfortunetly wordpress use number of custom posts to generate pagination pages. It can be problem in other projects.
$block_title = get_field('title') ? get_field('title') : 'Title';
$description_title = get_field('description_title') ? get_field('description_title') : __('Beginning with');
$visibility = !empty(get_field('search_custom_post_block_visibility') && is_array(get_field('search_custom_post_block_visibility'))) ? implode(' ', get_field('search_custom_post_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$type_of_posts = get_field('custom_post') ? get_field('custom_post') : 'families';

$post_type_object = get_post_type_object($type_of_posts);
$post_type_singular_name = $post_type_object->labels->singular_name;
$current_url = get_post_type_archive_link($post_type_object->name);

// Get search string if exist, cps is example
$search_string = isset($_GET['cps']) && !empty($_GET['cps']) ? $_GET['cps'] : null;

$sort = array(
    "a" => array(),
    "b" => array(),
    "c" => array(),
    "d" => array(),
    "e" => array(),
    "f" => array(),
    "g" => array(),
    "h" => array(),
    "i" => array(),
    "j" => array(),
    "k" => array(),
    "l" => array(),
    "m" => array(),
    "n" => array(),
    "o" => array(),
    "p" => array(),
    "q" => array(),
    "r" => array(),
    "s" => array(),
    "t" => array(),
    "u" => array(),
    "v" => array(),
    "w" => array(),
    "y" => array(),
    "z" => array(),
);

// Settings for pagination simulation
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = $search_string ? 99 : 4;
$max_pages = ceil(count($sort) / $posts_per_page);
$letter_start = $paged == 1 ? $paged : ($paged - 1) * $posts_per_page + 0.1;
$letter_end = $paged * $posts_per_page;
$index = 1;

// Assigning entries to the appropriate positions (first letter of the title) in the table
$posts_args = array(
    'post_type' => $type_of_posts,
    'orderby' => 'title',
    'posts_per_page' => -1,
    'order' => 'ASC'
);

// if search string exist, add search attribute to WP Query args
if ($search_string) {
    $posts_args['s'] = $search_string;
}

$posts_loop = new WP_Query($posts_args);

if ($posts_loop->have_posts()) :
    while ($posts_loop->have_posts()) :
        $posts_loop->the_post();
        $title = get_the_title();
        $title = strip_tags($title);

        foreach ($sort as $letter => $value) {
            if (strtolower($title[0]) == strtolower($letter)) {
                array_push($sort[$letter], get_the_ID());
            }
        }
    endwhile;
    wp_reset_postdata();
endif;

?>
<div class="boxwidth row search-custom-post">
    <div class="col-xxs-12 row search-custom-post__header">
        <div class="col col-xxs-12 col-md-3 flex">
            <h2 class="title title-sign txt-xxs-center txt-md-left"><?= $block_title ?></h2>
        </div>
        <div class="col col-xxs-12 col-md-7 col-md-offset-2 flex vertical horizontal__end">
            <form action="<?= $current_url ?>" class="search-custom-post__form">
                <input type="text" name="cps" class="search-custom-post__form--text" placeholder="Search..." value="<?= $search_string ? $search_string : null ?>">
                <input type="submit" value="Search <?= $post_type_singular_name ?>" class="btn-flat-secondary">
            </form>
        </div>
    </div>
    <?php
    //Display entries by the first letter of the title
    foreach ($sort as $letter => $ids) :
        $check_if_exist_search = $search_string ? !empty($ids) : true;
        if ($check_if_exist_search) : //for searching string
            if ($index >= $letter_start && $index <= $letter_end) : $index++
    ?>
                <div class="col col-xxs-12 col-sm-3 search-custom-post__desc">
                    <span class="search-custom-post__desc--title"><?= $description_title ?></span>
                    <span class="search-custom-post__desc--letter title-sign"><?= $letter ?></span>
                </div>
                <div class="col col-xxs-12 col-sm-9 search-custom-post__content">
                    <?php
                    foreach ($ids as $id) :
                        $permalink = get_the_permalink($id);
                        $title = get_the_title($id);
                    ?>

                        <a href="<?= $is_preview ? '#void' : $permalink ?>" class="link"><?= $title ?></a>
                    <?php endforeach ?>
                </div>
            <?php else : $index++ ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach ?>

    <div class="col col-xxs-12">
        <?php
        // Pagination simulation
        $pagination =   paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?page=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $max_pages,
            'mid_size' => 1,
            'prev_text' =>  '',
            'next_text' =>  '',
            'type' => 'array'
        ));

        include(TMPSHARED . 'pagination.php');
        ?>
    </div>
</div>