<?php
$visibility = !empty(get_field('column_block_visibility') && is_array(get_field('column_block_visibility'))) ? implode(' ', get_field('column_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$element_id = get_field('column_id') ? get_field('column_id') : null;
$spaces = get_field('column_column_styles_space_settings') ? implode(' ', array_filter(array_map(function ($value, $key) {
    if ($key === 'default_top_padding' && $value === 'none') {
        return 'padding-top--none';
    } elseif ($key === 'default_bottom_padding' && $value === 'none') {
        return 'padding-bottom--none';
    } elseif ($value !== 'none') {
        return $value;
    }
    return null;
}, get_field('column_column_styles_space_settings'), array_keys(get_field('column_column_styles_space_settings'))))) : null;
$content_align_horizontal = isset(get_field('column_content_align_settings')['horizontal']) ? implode(' ', get_field('column_content_align_settings')['horizontal']) : null;
$content_align_vertical = isset(get_field('column_content_align_settings')['vertical']) ? implode(' ', get_field('column_content_align_settings')['vertical']) : null;
$content_align = $content_align_horizontal || $content_align_vertical ? 'flex ' . $content_align_horizontal . ' ' . $content_align_vertical  : '';
$default_col_padding = get_field('default_col_padding') ? '' : 'col';
$animation_name = get_field('column_animation_name') ? get_field('column_animation_name') : null;

//column width
$column_width_small_mobile = get_field('column_width_small_mobile') ? get_field('column_width_small_mobile') : 'col-xxs-12';
$column_width_mobile = (get_field('column_width_mobile') && get_field('column_width_mobile') !== '0') ? ' ' . get_field('column_width_mobile') : '';
$column_width_tablet = (get_field('column_width_tablet') && get_field('column_width_tablet') !== '0') ? ' ' . get_field('column_width_tablet') : '';
$column_width_laptop = (get_field('column_width_laptop') && get_field('column_width_laptop') !== '0') ? ' ' . get_field('column_width_laptop') : '';
$column_width_desktop = (get_field('column_width_desktop') && get_field('column_width_desktop') !== '0') ? ' ' . get_field('column_width_desktop') : '';
$column_width = $column_width_small_mobile . $column_width_mobile . $column_width_tablet . $column_width_laptop . $column_width_desktop;

//column offset
$column_offset_small_mobile = (get_field('column_offset_small_mobile') && get_field('column_offset_small_mobile') !== '0') ? get_field('column_offset_small_mobile') : '';
$column_offset_mobile = (get_field('column_offset_mobile') && get_field('column_offset_mobile') !== '0') ? ' ' . get_field('column_offset_mobile') : '';
$column_offset_tablet = (get_field('column_offset_tablet') && get_field('column_offset_tablet') !== '0') ? ' ' . get_field('column_offset_tablet') : '';
$column_offset_laptop = (get_field('column_offset_laptop') && get_field('column_offset_laptop') !== '0') ? ' ' . get_field('column_offset_laptop') : '';
$column_offset_desktop = (get_field('column_offset_desktop') && get_field('column_offset_desktop') !== '0') ? ' ' . get_field('column_offset_desktop') : '';
$column_offset = $column_offset_small_mobile . $column_offset_mobile . $column_offset_tablet . $column_offset_laptop . $column_offset_desktop;

//column order
$column_order_small_mobile = (get_field('column_order_small_mobile') && get_field('column_order_small_mobile') !== '0') ? get_field('column_order_small_mobile') : '';
$column_order_mobile = (get_field('column_order_mobile') && get_field('column_order_mobile') !== '0') ? ' ' . get_field('column_order_mobile') : '';
$column_order_tablet = (get_field('column_order_tablet') && get_field('column_order_tablet') !== '0') ? ' ' . get_field('column_order_tablet') : '';
$column_order_laptop = (get_field('column_order_laptop') && get_field('column_order_laptop') !== '0') ? ' ' . get_field('column_order_laptop') : '';
$column_order_desktop = (get_field('column_order_desktop') && get_field('column_order_desktop') !== '0') ? ' ' . get_field('column_order_desktop') : '';
$column_order = $column_order_small_mobile . $column_order_mobile . $column_order_tablet . $column_order_laptop . $column_order_desktop;

// Removing padding in editor
if ($is_preview) {
    $default_col_padding = '';
    $column_width = '';
    $column_offset = '';
    $add_class = '';
} else {
    // Remove duplicate of column with and offset classes which are added by js in WP Editor to additional class to fix column blocks widths
    $col_settings = $column_width . ($column_offset ? ' ' . $column_offset : '');
    $add_class = str_replace($col_settings, '', $add_class);
}

/* rendering in inserter preview  */
if (isset($block['data']['preview_image'])) :
    echo '<img src="' . IMAGES . '/previews/' . $block['name'] . '.jpg" style="width:100%; height:auto;">';
else :
?>

    <div <?= $element_id ? 'id="' . $element_id . '"' : '' ?> class="<?=
                                                                        ($default_col_padding ? $default_col_padding : '') .
                                                                            ($column_width ? ' ' . $column_width : '') .
                                                                            ($column_offset ? ' ' . $column_offset : '') .
                                                                            ($column_order ? ' ' . $column_order : '') .
                                                                            ($spaces ? ' ' . $spaces : '') .
                                                                            ($content_align ? ' ' . $content_align : '') .
                                                                            ($add_class ? ' ' . $add_class : '') .
                                                                            ($visibility ? ' ' . $visibility : '')
                                                                        ?>" <?= $animation_name ? 'data-aos="' . $animation_name . '"' : "" ?>>
        <InnerBlocks />
    </div>

<?php endif; ?>