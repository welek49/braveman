<?php
$allowed_blocks = array('bn/column', 'bn/row', 'bn/container', 'bn/posts-columns', 'bn/partners-list', 'bn/archive-posts', 'bn/horizontal-tabs', 'bn/big-map');
$visibility = !empty(get_field('row_block_visibility') && is_array(get_field('row_block_visibility'))) ? implode(' ', get_field('row_block_visibility') ) : '';
$row_align = get_field('row_block_align') ? get_field('row_block_align') : 'box';
$add_class = isset($block['className']) ? $block['className'] : null;
$add_id = get_field('row_id') ? get_field('row_id') : null;
$spaces = get_field('row_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('row_styles_space_settings'))) : null;
$background = get_field('row_background_settings') ? get_field('row_background_settings') : null;
$animation_name = get_field('row_animation_name') ? get_field('row_animation_name') : null;
$animation_delay = get_field('row_animation_delay') ? get_field('row_animation_delay') : null;
$class_key = generateRandomString(10);

if (isset($background['desktop_background_video']) && $background['desktop_background_video']) {
    $desktop_video = $background['desktop_background_video'];
} else {
    $desktop_video = null;
    $desktop_image = isset($background['desktop_background_image']) ? $background['desktop_background_image'] : null;
}
if (isset($background['mobile_option'])) {
    if ($background['mobile_background_video']) {
        $mobile_video = $background['mobile_background_video'];
    } else {
        $mobile_video = null;
        $mobile_image = isset($background['mobile_background_image']) ? $background['mobile_background_image'] : null;
    }
} else {
    $mobile_video = null;
    $mobile_image = null;
}

if (isset($background['desktop_background_color'])) {
    $background_color = $background['desktop_background_color'] ? $background['desktop_background_color'] : null;
}

if ((isset($desktop_image) || isset($background_color)) && !$is_preview ) {
?>

<style>
    /* mobile */
    .bcg-<?= $class_key ?> {
        background-image: url('<?= $mobile_image ? $mobile_image['url'] : (isset($desktop_image) ? $desktop_image['url'] : '') ?>');
        background-color: <?= isset($background['desktop_background_color']) ? $background['desktop_background_color'] : 'transparent' ?>;
    }

    /* desktop */
    @media (min-width: 576px) {
        .bcg-<?= $class_key ?> {
            background-image: url('<?= isset($desktop_image) ? $desktop_image['url'] : '' ?>');
        }
    }
</style>

<?php } ?>

<div <?= $add_id ? 'id="' . $add_id . '"' : '' ?> class="<?= $row_align ?>width row bcg-<?= $class_key ?> <?= $spaces ?> <?= $add_class ?> <?= $visibility ?>" <?= $animation_name ? 'data-aos="'. $animation_name . '"' : "" ?><?= $animation_delay ? 'data-aos-delay="'. $animation_delay .'"' : "" ?>>
    <?php if ($desktop_video || $mobile_video) : ?>
        <div class="row__videobox">
            <video class="row__videobox--video" autoplay muted loop playsinline>
                <source class="row__video--source" src="<?= $desktop_video['url'] ?>" data-src="<?= $desktop_video ? $desktop_video['url'] : '' ?>" data-mobile="<?= $mobile_video ? $mobile_video['url'] : '' ?>" />
            </video>
        </div>
    <?php endif; ?>
    <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)) ?>" />
</div>