<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('image_slider_block_visibility') && is_array(get_field('image_slider_block_visibility'))) ? implode(' ', get_field('image_slider_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$images = get_field('images') ?? null;
$image_size = get_field('img_size') ?? 'full';

if ($images) : ?>
    <div class="image-slider <?= $visibility ?>">
        <div class="image-slider__wrapper">
            <div class="image-slider__slides bn-gallery-container">
                <?php foreach ($images as $image_id) :
                    $image_url = wp_get_attachment_url($image_id);
                    $image_meta = wp_get_attachment_metadata($image_id);

                    if ($image_url && $image_meta) :
                        $width = $image_meta['width'];
                        $height = $image_meta['height'];
                ?>
                        <div class="image-slider__slides--slide">
                            <a href="<?= $is_preview ? '#void' : esc_url($image_url) ?>" data-cropped="true" data-pswp-width="<?= esc_attr($width) ?>" data-pswp-height="<?= esc_attr($height) ?>">
                                <?php
                                echo wp_get_attachment_image($image_id, $image_size);
                                ?>
                            </a>
                        </div>
                <?php
                    endif;
                endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>