<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('gallery_block_visibility') && is_array(get_field('gallery_block_visibility'))) ? implode(' ', get_field('gallery_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('gallery_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('gallery_styles_space_settings'))) : null;
$images = get_field('images') ?? null;
$image_size = get_field('img_size') ?? 'full';

if ($images) :
    echo '<div class="bn-gallery bn-gallery-container">';
    foreach ($images as $image_id) :
        $image_url = wp_get_attachment_url($image_id);
        $image_meta = wp_get_attachment_metadata($image_id);

        if ($image_url && $image_meta) :
            $width = $image_meta['width'];
            $height = $image_meta['height'];
?>
            <div class="bn-gallery__wrapper">
                <a href="<?= $is_preview ? '#void' : esc_url($image_url) ?>" data-cropped="true" data-pswp-width="<?= esc_attr($width) ?>" data-pswp-height="<?= esc_attr($height) ?>" class="bn-gallery__image">
                    <?php
                    echo wp_get_attachment_image($image_id, $image_size);
                    ?>
                </a>
            </div>
<?php
        endif;
    endforeach;
    echo '</div>';
endif;
?>