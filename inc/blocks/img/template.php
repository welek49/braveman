<?php
$visibility = !empty(get_field('image_block_visibility') && is_array(get_field('image_block_visibility'))) ? implode(' ', get_field('image_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('image_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('image_styles_space_settings'))) : null;
$lightbox = get_field('lightbox') ?? null;
$animation_name = get_field('image_animation_name') ?? null;
$animation_delay = get_field('image_animation_delay') ?? null;
$image_id = get_field('img') ?? null;
$image_caption = wp_get_attachment_caption($image_id);

if ($image_id) :
    $image_size = get_field('img_size') ?? 'full';
    $full_image_url = wp_get_attachment_image_url($image_id, 'full');
    $image_attributes = wp_get_attachment_metadata($image_id);

    $image_width = isset($image_attributes['width']) ? $image_attributes['width'] : '';
    $image_height = isset($image_attributes['height']) ? $image_attributes['height'] : '';

    $img_html = wp_get_attachment_image($image_id, $image_size, false, [
        'class' => "image {$spaces} {$add_class} {$visibility}",
        'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
        'width' => $image_width,
        'height' => $image_height,
        'data-aos' => $animation_name ?: '',
        'data-aos-delay' => $animation_delay ?: '',
    ]);
?>
    <figure>
        <?= $lightbox ? '<a href="' . ($is_preview ? '#void' : $full_image_url) . '" data-cropped="true" data-pswp-width="' . $image_width . '" data-pswp-height="' . $image_height . '">' : '' ?>

        <?= $img_html; ?>

        <?php if ($image_caption) : ?>
            <figcaption><?= esc_html($image_caption) ?></figcaption>
        <?php endif; ?>

        <?= $lightbox ? '</a>' : '' ?>
    </figure>
<?php endif; ?>