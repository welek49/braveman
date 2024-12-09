<?php
$allowed_blocks = array('bn/row', 'bn/container', 'core/block', 'bn/big-map');
$visibility = !empty(get_field('section_block_visibility') && is_array(get_field('section_block_visibility'))) ? implode(' ', get_field('section_block_visibility') ) : '';
$section_align = get_field('section_block_align') ? get_field('section_block_align') : 'box';
$add_class = isset($block['className']) ? $block['className'] : null;
$add_id = get_field('section_id') ? get_field('section_id') : null;
$spaces = get_field('section_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('section_styles_space_settings'))) : null;
$background = get_field('section_background_settings') ? get_field('section_background_settings') : null;
$animation_name = get_field('section_animation_name') ? get_field('section_animation_name') : null;
$class_key = generateRandomString(10);

if (!empty($background['desktop_background_video'])) {
    $desktop_video = $background['desktop_background_video'];
} else {
    $desktop_video = null;
    $desktop_image = !empty($background['desktop_background_image']) ? $background['desktop_background_image'] : null;
}

if (!empty($background['mobile_background_video'])) {
    $mobile_video = $background['mobile_background_video'];
} else {
    $mobile_video = null;
    $mobile_image = !empty($background['mobile_background_image']) ? $background['mobile_background_image'] : null;
}

if ((!empty($desktop_image['url']) || !empty($background['desktop_background_color'])) && !$is_preview ) { ?>

<style>
    /* mobile */
    .bcg-<?= $class_key ?> {
        <?php if (!empty($mobile_image['url']) || !empty($desktop_image['url'])) echo "background-image: url('" . ($mobile_image['url'] ? $mobile_image['url'] : $desktop_image['url']) . "');"; ?>
        <?php if (!empty($background['desktop_background_color'])) echo "background-color: " . $background['desktop_background_color']; ?>;
    }

    /* desktop */
    <?php if (!empty($desktop_image['url'])) { ?>
    @media (min-width: 576px) {
        .bcg-<?= $class_key ?> {
            background-image: url(' <?= $desktop_image['url'] ?>');
        }
    }
    <?php } ?>;
</style>

<?php } ?>

<section <?= $add_id ? 'id="' . $add_id . '"' : '' ?> class="section bcg-<?= $class_key ?> <?= $section_align ?>width flex wrap horizontal horizontal__center <?= $spaces ?> <?= $add_class ?> <?= $visibility ?>" <?= $animation_name ? 'data-aos="'. $animation_name . '"' : "" ?>>
    <?php if ($desktop_video || $mobile_video) : ?>
        <div class="section__videobox">
            <video class="section__videobox--video" autoplay muted loop playsinline>
                <source class="section__video--source" src="<?= $desktop_video['url'] ?>" data-src="<?= $desktop_video ? $desktop_video['url'] : '' ?>" data-mobile="<?= $mobile_video ? $mobile_video['url'] : '' ?>" />
            </video>
        </div>
    <?php endif; ?>
    <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)) ?>" />
</section>